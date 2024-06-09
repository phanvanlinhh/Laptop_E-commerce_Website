<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoriesPost extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_category_post() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.category_post.add_category_post');
    }

    public function list_categories_post() {
        $this->AuthLogin();
        $list_categories_post = DB::table('categories_post')->get();
        $manager_categories_post = view('admin.category_post.list_categories_post')->with('list_categories_post', $list_categories_post);
        
        return view('admin.layout')->with('admin.category_post.list_categories_post', $manager_categories_post);
    }

    public function save_category_post(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_post_name;
        $data['category_desc'] = $request->category_post_desc;
        $data['category_status'] = $request->category_post_status;
        $data['created_at'] = now();
        
        DB::table('categories_post')->insert($data);
        Session::put('message', 'Thêm danh mục bài viết thành công!');
        return redirect('list-categories-post');
    }

    public function unactive_category_post($category_post_id) {
        $this->AuthLogin();
        DB::table('categories_post')->where('category_id', $category_post_id)->update([
                'category_status'=>1,
                'updated_at' => now(),
            ]);
        Session::put('message', 'Đã kích hoạt danh mục bài viết!');
        return redirect('list-categories-post');
    }

    public function active_category_post($category_post_id) {
        $this->AuthLogin();
        DB::table('categories_post')->where('category_id', $category_post_id)->update([
                'category_status'=>0,
                'updated_at' => now(),
            ]);
        Session::put('message', 'Đã ngừng kích hoạt danh mục bài viết!');
        return redirect('list-categories-post');
    }

    public function edit_category_post($category_post_id) {
        $this->AuthLogin();
        $edit_category_post = DB::table('categories_post')->where('category_id', $category_post_id)->get();
        $manager_category_post = view('admin.category_post.edit_category_post')->with('edit_category_post', $edit_category_post);
        
        return view('admin.layout')->with('admin.category_post.edit_category_post', $manager_category_post);
    }

    public function update_category_post(Request $request, $category_post_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_post_name;
        $data['category_desc'] = $request->category_post_desc;
        $data['updated_at'] = now();

        DB::table('categories_post')->where('category_id', $category_post_id)->update($data);
        Session::put('message', 'Cập nhật danh mục bài viết thành công!');
        return redirect('list-categories-post');
    }

    public function delete_category_post($category_post_id) {
        $this->AuthLogin();
        DB::table('categories_post')->where('category_id', $category_post_id)->delete();
        Session::put('message', 'Đã xóa danh mục bài viết!');
        return redirect('list-categories-post');
    }
    // End function Admin Page
    
    public function show_category_home($category_id) {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        $list_post = DB::table('tbl_post')->where('post_status',1)->where('cate_post_id', $category_id)->paginate(3);
        $all_post = DB::table('tbl_post')->where('post_status',1)->orderBy('created_at', 'desc')->get();

        $category_name = DB::table('categories_post')->where('category_status', '1')->where('category_id', $category_id)->first();

        return view('pages.posts.category_post')->with([
            'category' => $cate_product,
            'category_post'=> $cate_post,
            'list_post'=> $list_post,
            'all_post' => $all_post,
            'category_name' => $category_name,
        ]);
    }
}

