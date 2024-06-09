<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\SliderModel;
use App\Models\PartnerModel;
session_start();

class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        // $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        //->orderBy('product.product_id', 'desc')->get();

        $list_product = DB::table('product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();

        $slider = SliderModel::orderby('slider_id', 'desc')->get();
        $partner = PartnerModel::orderby('partner_id', 'desc')->get();

        return view('pages.home')->with('category', $cate_product)->with('category_post', $cate_post)->with('list_product', $list_product)->with(compact('slider', 'partner'));
    }

    public function search(Request $request) {
        
        $keywords = $request->keyword_submit;
        // SEO
        $meta_desc = "LAPTOP LT - THẾ GIỚI LAPTOP";
        $meta_keywords = "laptop, laptop gaming, macbook, dell, notebook, pc, desktop, desktop computer, cheap laptops, laptop gia re, laptop giá rẻ, laptops for sale, laptop sale, hp, asus, vaio, intel, sony, lg, window, mac os, ";
        $meta_title = "Kết quả tìm kiếm";
        $url_canonical = $request->url();
        // END SEO
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        $search_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        ->where('product_name', 'like', '%'.$keywords.'%')->get();

        return view('pages.product.search')->with('category', $cate_product)->with('category_post', $cate_post)->with('search_product', $search_product)
        ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }

    // Banner
    
}