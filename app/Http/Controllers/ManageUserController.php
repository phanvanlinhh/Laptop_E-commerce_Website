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

class ManageUserController extends Controller
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

    public function list_clients()
    {
        $this->AuthLogin();

        // address
        $city = City::orderby('matp', 'ASC')->get();
        $province = Province::orderby('maqh', 'ASC')->get();
        $wards = Wards::orderby('xaid', 'ASC')->get();
        
        $list_clients = DB::table('users')->where('remember_token',null)->get();
        $manager_clients = view('admin.user.list_clients')->with('list_clients', $list_clients)->with([
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        
        return view('admin.layout')->with('admin.user.list_clients', $manager_clients);
    }

    public function list_staffs()
    {
        $this->AuthLogin();

        // address
        $city = City::orderby('matp', 'ASC')->get();
        $province = Province::orderby('maqh', 'ASC')->get();
        $wards = Wards::orderby('xaid', 'ASC')->get();
        
        $list_staffs = DB::table('users')->where('remember_token',1)->get();
        $manager_staffs = view('admin.user.list_staffs')->with('list_staffs', $list_staffs)->with([
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);;
        
        return view('admin.layout')->with('admin.user.list_staffs', $manager_staffs);
    }

    public function lock_user($user_id) {
        $this->AuthLogin();
        $name = DB::table('users')->where('id', $user_id)->first()->name;
        DB::table('users')->where('id', $user_id)->update([
                'status'=>'locked',
                'updated_at' => now(),
            ]);
        return back()->with('message','Tài khoản '.$name.' đã bị KHOÁ vào lúc '.now());
    }

    public function unlock_user($user_id) {
        $this->AuthLogin();
        $name = DB::table('users')->where('id', $user_id)->first()->name;
        DB::table('users')->where('id', $user_id)->update([
                'status'=>'unlocked',
                'updated_at' => now(),
            ]);
        return back()->with('message','Tài khoản '.$name.' đã được MỞ khoá vào lúc '.now());
    }

    public function add_user() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.user.add_user');
    }

    public function add_user_handle(Request $request) {
        $this->AuthLogin();

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;
        $data['street_address'] = $request->street_address;
        $data['district'] = $request->district;
        $data['city'] = $request->city;
        $data['status'] = $request->status;
        $data['remember_token'] = $request->remember_token;
        $data['created_at'] = now();

        $insert_user_id = DB::table('users')->insertGetId($data);

        // ghi sẵn data cho payment
        $payment = array();
        $payment['user_id'] = $insert_user_id;
        $payment['created_at'] = now();

        DB::table('payment')->insert($payment);

        //for message
        if($data['remember_token'] == null) {
            $role = 'Khách hàng';
        } else {
            $role = 'Nhân viên';
        }

        return back()->with('message', 'Tài khoản '.$data['name'].' với vai trò '.$role.' đã được thêm thành công vào lúc '.now());
    }

    public function update_user($user_id) {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        //Get user data and user's payment data
        $user = DB::table('users')->where('id',$user_id)->first();
        // print_r($user); test data
        $payment = DB::table('payment')->where('user_id',$user_id)->first();
        // print_r($user_details); test data

        Session::put('user',[
                'id' => $user_id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'street_address' => $user->street_address,
                'city' => $user->city,
                'district' => $user->district,
                'status' => $user->status,
                'remember_token' => $user->remember_token,
                'zip_code' => $payment->zip_code,
                'credit_card_name' => $payment->credit_card_name,
                'credit_card_num' => $payment->credit_card_num,
                'exp_month' => $payment->exp_month,
                'exp_year' => $payment->exp_year,
                'cvv_cvc' => $payment->cvv_cvc,
                'updated_at' => $payment->updated_at,
            ]);

        return view('admin.user.update_user');
    }

    public function update_user_handle(Request $request,$user_id) {
        $this->AuthLogin();

        $updated_user = DB::table('users')->where('id',$user_id)->update([
            'name' => $request->name,
            'password' => md5($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'district' => $request->district,
            'status' => $request->status,
            'remember_token' => $request->remember_token,
            'updated_at'=> now(),
        ]);

        $updated_payment = DB::table('payment')->where('user_id',$user_id)->update([
            'user_id' => $user_id,
            'zip_code' => $request->zip_code,
            'credit_card_name' => $request->credit_card_name,
            'credit_card_num' => $request->credit_card_num,
            'exp_month' => $request->exp_month,
            'exp_year' => $request->exp_year,
            'cvv_cvc' => $request->cvv_cvc,
            'updated_at'=> now(),
        ]);

        return back()->with('message', 'Tài khoản '.$request->name.' đã được chỉnh sửa thành công vào lúc '.now());
    }

    public function delete_user($user_id) {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $name = DB::table('users')->where('id',$user_id)->first()->name;

        DB::table('users')->where('id',$user_id)->delete();
        DB::table('payment')->where('user_id',$user_id)->delete();

        return back()->with('message','Đã xoá tài khoản '.$name.' vào lúc '.now());
    }

}
