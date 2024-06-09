<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_post() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $cate_post = DB::table('categories_post')->orderBy('category_id', 'desc')->get();
        
        return view('admin.post.add_post')->with('cate_post', $cate_post);

    }

    public function list_post() {
        $this->AuthLogin();
        $list_post = DB::table('tbl_post')->join('categories_post','categories_post.category_id','=','tbl_post.cate_post_id')->select('tbl_post.*','categories_post.*','tbl_post.created_at as post_created_at', 'tbl_post.updated_at as post_updated_at')
        ->orderBy('tbl_post.post_id', 'desc')->get();
        $manager_post = view('admin.post.list_post')->with('list_post', $list_post);
        // echo '<pre>';
        // print_r($list_post);
        // echo '</pre>';
        return view('admin.layout')->with('admin.post.list_post', $manager_post);
    }

    public function save_post(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['cate_post_id'] = $request->cate_post_id;
        $data['post_thumbnail'] = $request->post_thumbnail;
        $data['post_content'] = $request->post_content;
        $data['post_meta_desc'] = $request->post_meta_desc;
        $data['post_meta_keywords'] = $request->post_meta_keywords;
        $data['post_view'] = 0;
        $data['post_status'] = $request->post_status;
        $data['created_at'] = now();
        $get_image = $request->file('post_thumbnail');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post', $new_image);
            $data['post_thumbnail'] = $new_image;
            DB::table('tbl_post')->insert($data);
            Session::put('message', 'Thêm bài viết thành công!');
            return redirect('list-post');
        }
        $data['post_thumbnail'] = '';
        DB::table('tbl_post')->insert($data);
        Session::put('message', 'Thêm bài viết thành công!');
        return redirect('list-post');
    }

    public function unactive_post($post_id) {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->update([
            'post_status'=>1,
            'updated_at'=>now(),
        ]);
        Session::put('message', 'Bài viết bạn vừa click đã được công khai!');
        return redirect('list-post');
    }

    public function active_post($post_id) {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->update([
            'post_status'=>0,
            'updated_at'=>now(),
        ]);
        Session::put('message', 'Bài viết bạn vừa click đã bị ẩn!');
        return redirect('list-post');
    }

    public function edit_post($post_id) {
        $this->AuthLogin();
        $cate_post = DB::table('categories_post')->orderBy('category_id', 'desc')->get();
        $edit_post = DB::table('tbl_post')->where('post_id', $post_id)->first();
        $manager_post = view('admin.post.edit_post')->with('edit_post', $edit_post)->with('cate_post', $cate_post);
        
        return view('admin.layout')->with('admin.post.edit_post', $manager_post);
    }

    public function update_post(Request $request, $post_id) {
        $this->AuthLogin();
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['cate_post_id'] = $request->cate_post_id;
        $data['post_thumbnail'] = $request->post_thumbnail;
        $data['post_meta_desc'] = $request->post_meta_desc;
        $data['post_meta_keywords'] = $request->post_meta_keywords;
        $data['post_content'] = $request->post_content;
        $data['post_status'] = $request->post_status;
        $data['updated_at'] = now();
        $get_image = $request->file('post_thumbnail');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post', $new_image);
            $data['post_thumbnail'] = $new_image;
            DB::table('tbl_post')->where('post_id', $post_id)->update($data);
            Session::put('message', 'Cập nhật bài viết thành công!');
            return redirect('list-post');
        }
        DB::table('tbl_post')->where('post_id', $post_id)->update($data);
        Session::put('message', 'Cập nhật bài viết thành công!');
        return redirect('list-post');
    }

    public function delete_post($post_id) {
        $this->AuthLogin();
        DB::table('tbl_post')->where('post_id', $post_id)->delete();
        Session::put('message', 'Đã xóa bài viết thành công!');
        return redirect('list-post');
    }
    // End function Admin Pages

    // ở postcontroller (tìm đoạn code thay vào)

public function content_post($post_id) {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        $this_post = DB::table('tbl_post')->where('post_status',1)->where('post_id',$post_id)->first();
        $this_cate_post = $this_post->cate_post_id;
        $all_post = DB::table('tbl_post')->orderBy('created_at', 'desc')->where('post_status',1)->get();

        $count_view = DB::table('tbl_post')->where('post_id',$this_post->post_id)->value('post_view');
        $count_view = $count_view + 1;
        $count_view = DB::table('tbl_post')->where('post_id',$this_post->post_id)->update([
            'post_view' => $count_view,
        ]);

        return view('pages.posts.post')->with([
            'category'=> $cate_product,
            'category_post'=> $cate_post,
            'this_post'=> $this_post,
            'all_post' => $all_post,
        ]);
    }

}
