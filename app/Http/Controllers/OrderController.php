<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;

session_start();

class OrderController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    // USER MANAGEMENT

    public function order_waiting()
    {
        $this->AuthLogin();

        // address
        $city = City::orderby('matp', 'ASC')->get();
        $province = Province::orderby('maqh', 'ASC')->get();
        $wards = Wards::orderby('xaid', 'ASC')->get();
        
        $list_orders_waiting = DB::table('tbl_order')->where('order_status',0)->get();

        $order_details = DB::table('tbl_order_details')->get();
        $shippings = DB::table('tbl_shipping')->get();
        $s_payments = DB::table('tbl_payment')->get();
        Session::put([
                's_payments' => $s_payments,
                'order_details' => $order_details,
                'shippings' => $shippings,
            ]);

        $manager_orders_waiting = view('admin.order.waiting_order')->with('list_orders_waiting', $list_orders_waiting)->with([
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        
        return view('admin.layout')->with('admin.order.waiting_order', $manager_orders_waiting);
    }

    public function order_handled()
    {
        $this->AuthLogin();

        // address
        $city = City::orderby('matp', 'ASC')->get();
        $province = Province::orderby('maqh', 'ASC')->get();
        $wards = Wards::orderby('xaid', 'ASC')->get();
        
        $list_orders_waiting = DB::table('tbl_order')->where('order_status',1)->get();

        $order_details = DB::table('tbl_order_details')->get();
        $shippings = DB::table('tbl_shipping')->get();
        $s_payments = DB::table('tbl_payment')->get();
        Session::put([
                's_payments' => $s_payments,
                'order_details' => $order_details,
                'shippings' => $shippings,
            ]);

        $manager_orders_waiting = view('admin.order.waiting_order')->with('list_orders_waiting', $list_orders_waiting)->with([
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        
        return view('admin.layout')->with('admin.order.waiting_order', $manager_orders_waiting);
    }

    public function order_handling($order_id) {
        $this->AuthLogin();
        $customer_id = DB::table('tbl_order')->where('id', $order_id)->first()->customer_id;
        $name = DB::table('users')->where('id', $customer_id)->first()->name;
        DB::table('tbl_order')->where('id', $order_id)->update([
                'order_status'=>'1',
                'updated_at' => now(),
            ]);
        return redirect('/order-waiting')->with('message','Đơn hàng có mã ['.$order_id.'] của khách hàng '.$name.' đã được XỬ LÍ vào lúc '.now());
    }

    public function order_unhandle($order_id) {
        $this->AuthLogin();
        $customer_id = DB::table('tbl_order')->where('id', $order_id)->first()->customer_id;
        $name = DB::table('users')->where('id', $customer_id)->first()->name;
        DB::table('tbl_order')->where('id', $order_id)->update([
                'order_status'=>'0',
                'updated_at' => now(),
            ]);
        return redirect('/order-handled')->with('message','Đơn hàng có mã ['.$order_id.'] của khách hàng '.$name.' đã bị HUỶ xử lí vào lúc '.now());
    }
    

}
