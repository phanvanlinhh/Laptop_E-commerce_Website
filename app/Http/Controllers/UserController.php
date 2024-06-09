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

class UserController extends Controller
{
    /* -- CLIENT -- */

    // LOGIN
    public function client_login()
    {
        // print_r(session('back_url')); test back url
        return view('client.client_login');
    }

    public function handle_login(Request $request) {
        $client_user = $request->client_user;
        $client_password = md5($request->client_password);

        $result = DB::table('users')->where('name', $client_user)->where('password', $client_password)->first();
        if ($result) {
            Session::put('name', $result->name);
            Session::put('id', $result->id);

            if($result->status == 'locked') {
                return back()->with('status', 'Tài khoản '.$result->name.' của bạn đã bị khoá! Hãy tạo tài khoản mới hoặc dùng tài khoản khác để đăng nhập');
            } else {
                // echo 'login successful !!';
                return redirect(session('back_url'));
            }
            
        } else {
            return back()->with('status', 'Tên tài khoản hoặc mật khẩu bị sai! vui lòng nhập lại');
        }
    }

    // LOGOUT
    public function client_logout()
    {
        Session::put('name', null);
        Session::put('id', null);

        return back();
    }

    // REGISTER
    public function client_register()
    {
        return view('client.client_register');
    }

    public function handle_register(Request $request)
    {
        $data = array();
        $data['name'] = $request->client_user;
        $data['email'] = $request->email;
        $data['password'] = md5($request->client_password);
        $data['status'] = 'unlocked';
        $data['created_at'] = now();

        $insert_user_id = DB::table('users')->insertGetId($data);

        // ghi sẵn data cho payment
        $payment = array();
        $payment['user_id'] = $insert_user_id;
        $payment['created_at'] = now();
        $insert_payment_id = DB::table('payment')->insertGetId($payment);

        Session::put('name', $request->client_user);
        Session::put('id', $insert_user_id);
        return view('client.client_login')->with('status', 'Đăng kí thành công! Hãy thử đăng nhập nào');
    }

    //UPDATE INFO
    public function client_update(Request $request) {

        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        //Get id client from session
        $client_id = Session::get('id');

        //Get client data and client's payment data
        $user = DB::table('users')->where('id',$client_id)->first();
        // print_r($user); test data
        $payment = DB::table('payment')->where('user_id',$client_id)->first();
        // print_r($payment); test data

        if($client_id) {
            // echo 'Đã đăng nhập !!';

            Session::put('user',[
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'street_address' => $user->street_address,
                'ward_id' => $user->ward_id,
                'city_id' => $user->city_id,
                'district_id' => $user->district_id,
                'zip_code' => $payment->zip_code,
                'credit_card_name' => $payment->credit_card_name,
                'credit_card_num' => $payment->credit_card_num,
                'exp_month' => $payment->exp_month,
                'exp_year' => $payment->exp_year,
                'cvv_cvc' => $payment->cvv_cvc,
                'updated_at' => $payment->updated_at,
            ]);

            // address
            $city = City::orderby('matp', 'ASC')->get();
            $province = Province::orderby('maqh', 'ASC')->get();
            $wards = Wards::orderby('xaid', 'ASC')->get();

            return view('client.client_update')->with([
                'category'=> $cate_product,
                'category_post' => $cate_post,
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        } else {
            // echo 'Chưa đăng nhập !!';
            return redirect('/');
        }
    }

    public function handle_update(Request $request)
    {
        $client_id = Session::get('id');
        $updated_user = DB::table('users')->where('id',$client_id)->update([
            'name' => $request->name,
            'password' => md5($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'street_address' => $request->street_address,
            'ward_id' => $request->wards,
            'city_id' => $request->city,
            'district_id' => $request->province,
            'updated_at'=> now(),
        ]);

        $updated_payment = DB::table('payment')->where('user_id',$client_id)->update([
            'user_id' => $client_id,
            'zip_code' => $request->zip_code,
            'credit_card_name' => $request->credit_card_name,
            'credit_card_num' => $request->credit_card_num,
            'exp_month' => $request->exp_month,
            'exp_year' => $request->exp_year,
            'cvv_cvc' => $request->cvv_cvc,
            'updated_at'=> now(),
        ]);

        Session::put('name', $request->name);
        Session::put('id', $client_id);
        return back()->with('status_update','success');
    }

    //VIEW INFO
    public function client_info()
    {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        //Get id client from session
        $client_id = Session::get('id');

        //Get client data and client's payment data
        $user = DB::table('users')->where('id',$client_id)->first();
            // print_r($user); test data
        $payment = DB::table('payment')->where('user_id',$client_id)->first();
            // print_r($payment); test data

        //Get Client's Order data
        $orders = DB::table('tbl_order')->where('customer_id',$client_id)->orderBy('created_at', 'desc')->paginate(3);
        $order_details = DB::table('tbl_order_details')->get();
        Session::put([
                'orders' => $orders,
                'order_details' => $order_details,
            ]);

        if($client_id) {
            // echo 'Đã đăng nhập !!';

            Session::put('user',[
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'street_address' => $user->street_address,
                'ward_id' => $user->ward_id,
                'city_id' => $user->city_id,
                'district_id' => $user->district_id,
                'zip_code' => $payment->zip_code,
                'credit_card_name' => $payment->credit_card_name,
                'credit_card_num' => $payment->credit_card_num,
                'exp_month' => $payment->exp_month,
                'exp_year' => $payment->exp_year,
                'cvv_cvc' => $payment->cvv_cvc,
                'updated_at' => $payment->updated_at,
            ]);

            // address
            $city = City::orderby('matp', 'ASC')->get();
            $province = Province::orderby('maqh', 'ASC')->get();
            $wards = Wards::orderby('xaid', 'ASC')->get();

        return view('client.personal.client_info')->with([
                'category'=> $cate_product,
                'category_post' => $cate_post,
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        } else {
            // echo 'Chưa đăng nhập !!';
            return redirect('/');
        }
    }

    public function order_history()
    {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        //Get id client from session
        $client_id = Session::get('id');

        //Get client data and client's payment data
        $user = DB::table('users')->where('id',$client_id)->first();
            // print_r($user); test data
        $payment = DB::table('payment')->where('user_id',$client_id)->first();
            // print_r($payment); test data

        //Get Client's Order data
        $orders = DB::table('tbl_order')->where('customer_id',$client_id)->orderBy('created_at', 'desc')->paginate(3);
        $order_details = DB::table('tbl_order_details')->get();
        $shippings = DB::table('tbl_shipping')->get();
        $s_payments = DB::table('tbl_payment')->get();
        Session::put([
                'orders' => $orders,
                'order_details' => $order_details,
                'shippings' => $shippings,
                's_payments' => $s_payments,
            ]);

        if($client_id) {
            // echo 'Đã đăng nhập !!';

            Session::put('user',[
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'street_address' => $user->street_address,
                'ward_id' => $user->ward_id,
                'city_id' => $user->city_id,
                'district_id' => $user->district_id,
                'zip_code' => $payment->zip_code,
                'credit_card_name' => $payment->credit_card_name,
                'credit_card_num' => $payment->credit_card_num,
                'exp_month' => $payment->exp_month,
                'exp_year' => $payment->exp_year,
                'cvv_cvc' => $payment->cvv_cvc,
                'updated_at' => $payment->updated_at,
            ]);

            // address
            $city = City::orderby('matp', 'ASC')->get();
            $province = Province::orderby('maqh', 'ASC')->get();
            $wards = Wards::orderby('xaid', 'ASC')->get();

        return view('client.personal.client_order_history')->with([
                'category'=> $cate_product,
                'category_post' => $cate_post,
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        } else {
            // echo 'Chưa đăng nhập !!';
            return redirect('/');
        }
    }
}
