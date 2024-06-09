<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoriesProduct extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_category_product() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.category.add_category_product');
    }

    public function list_categories_product() {
        $this->AuthLogin();
        $list_categories_product = DB::table('categories_product')->get();
        $manager_categories_product = view('admin.category.list_categories_product')->with('list_categories_product', $list_categories_product);
        
        return view('admin.layout')->with('admin.category.list_categories_product', $manager_categories_product);
    }

    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['created_at'] = $request->created_at;
        
        DB::table('categories_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return redirect('list-categories-product');
    }

    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('categories_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        Session::put('message', 'Đã kích hoạt danh mục sản phẩm!');
        return redirect('list-categories-product');
    }

    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('categories_product')->where('category_id', $category_product_id)->update(['category_status'=>0]);
        Session::put('message', 'Đã ngừng kích hoạt danh mục sản phẩm!');
        return redirect('list-categories-product');
    }

    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
        $edit_category_product = DB::table('categories_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.category.edit_category_product')->with('edit_category_product', $edit_category_product);
        
        return view('admin.layout')->with('admin.category.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $category_product_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['updated_at'] = $request->updated_at;

        DB::table('categories_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công!');
        return redirect('list-categories-product');
    }

    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('categories_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Đã xóa danh mục sản phẩm!');
        return redirect('list-categories-product');
    }
    // End function Admin Page
    
    public function show_category_home($category_id) {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        $category_by_id = DB::table('product')->join('categories_product', 'product.category_id', '=', 'categories_product.category_id')
        ->where('product.category_id', $category_id)->get();
        $category_name = DB::table('categories_product')->where('categories_product.category_id', $category_id)->limit(1)->get();
        return view('pages.categories.show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name)->with('category_post', $cate_post);
    }
}
