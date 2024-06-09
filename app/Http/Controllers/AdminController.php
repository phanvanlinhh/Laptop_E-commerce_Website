<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function index() {
        return view('admin.login');
    }
    
    public function show_dashboard() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $list_orders_waiting = DB::table('tbl_order')->where('order_status',0)->get();
        $list_user = DB::table('users')->get();

        return view('admin.dashboard')->with([
            'list_orders_waiting' => $list_orders_waiting,
            'list_user' => $list_user,
        ]);
    }
    public function dashboard(Request $request) {
        $admin_user = $request->admin_user;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admin')->where('admin_user', $admin_user)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        } else {
            Session::put('message', 'Tên đăng nhập hoặc mật khẩu không chính xác!<br> Vui lòng kiểm tra lại!');
            return redirect('/admin');
        }
    }

    public function logout() {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('/admin');
    }
}
