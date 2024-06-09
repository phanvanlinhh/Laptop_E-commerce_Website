<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rating;
session_start();

class ProductController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_product() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $cate_product = DB::table('categories_product')->orderBy('category_id', 'desc')->get();
        
        return view('admin.product.add_product')->with('cate_product', $cate_product);

    }

    public function list_product() {
        $this->AuthLogin();
        $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        ->orderBy('product.product_id', 'desc')->get();
        $manager_product = view('admin.product.list_product')->with('list_product', $list_product);
        // echo '<pre>';
        // print_r($list_product);
        // echo '</pre>';
        return view('admin.layout')->with('admin.product.list_product', $manager_product);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['product_image'] = $request->product_image;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_details'] = $request->product_details;
        $data['product_parameters'] = $request->product_parameters;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return redirect('list-product');
        }
        $data['product_image'] = '';
        DB::table('product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công!');
        return redirect('list-product');
    }

    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('message', 'Số lượng sản phẩm bạn vừa click đã được cập nhật!');
        return redirect('list-product');
    }

    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('message', 'Sản phẩm bạn vừa click đã hết hàng!');
        return redirect('list-product');
    }

    public function edit_product($product_id) {
        $this->AuthLogin();
        $cate_product = DB::table('categories_product')->orderBy('category_id', 'desc')->get();
        $edit_product = DB::table('product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        
        return view('admin.layout')->with('admin.product.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate;
        $data['product_image'] = $request->product_image;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_details'] = $request->product_details;
        $data['product_parameters'] = $request->product_parameters;
        $get_image = $request->file('product_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return redirect('list-product');
        }
        DB::table('product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return redirect('list-product');
    }

    public function delete_product($product_id) {
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Đã xóa sản phẩm thành công!');
        return redirect('list-product');
    }
    // End function Admin Pages


public function details_product($product_id) {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $details_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        ->where('product.product_id', $product_id)->get();

        foreach($details_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        ->where('categories_product.category_id', $category_id)->whereNotIn('product.product_id', [$product_id  ])->get();

        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);

        return view('pages.product.show_details')->with('category', $cate_product)->with('category_post', $cate_post)->with('product_details', $details_product)
        ->with('relate', $related_product)->with('rating',$rating);
    }

    public function insert_rating(Request $request) {
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }


}
