<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ContactController extends Controller
{
    public function contact() {

        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        return view('pages.contact.contact')->with('category', $cate_product)->with('category_post', $cate_post);
    }
}
