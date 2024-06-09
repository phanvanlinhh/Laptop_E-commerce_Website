<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\PartnerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BannerController extends Controller {

    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }
    
    public function manage_slider() {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $list_slide = SliderModel::orderby('slider_id', 'desc')->get();
        return view('admin.banner.list_slider')->with(compact('list_slide'));
    }

    public function add_slider() {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        return view('admin.banner.add_slider');
    }

    public function insert_slider(Request $request) {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $data = $request->all();
        $get_image = $request->file('slider_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);
            
            $slider = new SliderModel();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->save();

            Session::put('message', 'Thêm Slide thành công!');
            return redirect('/slider');
        } else {
            return redirect('/them-slider');
        }

    }

    public function delete_slider($slider_id) {

        $this->AuthLogin();

        $slider = SliderModel::find($slider_id);
        $slider_image = $slider->slider_image;
        if($slider_image) {
            $path = 'public/uploads/slider/'.$slider_image;
            unlink($path);
        }
        $slider->delete();

        Session::put('message', 'Đã xóa Slide thành công!');
        return redirect()->back();
    }

    // ----------------------------------------------------

    public function manage_partner() {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $list_partner = PartnerModel::orderby('partner_id', 'desc')->get();
        return view('admin.banner.list_partner')->with(compact('list_partner'));
    }

    public function add_partner() {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        return view('admin.banner.add_partner');
    }

    public function insert_partner(Request $request) {

        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập

        $data = $request->all();
        $get_image = $request->file('partner_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/partner', $new_image);
            
            $partner = new PartnerModel();
            $partner->partner_name = $data['partner_name'];
            $partner->partner_image = $new_image;
            $partner->partner_link = $data['partner_link'];
            $partner->save();

            Session::put('message', 'Thêm đối tác thành công!');
            return redirect('/doi-tac');
        } else {
            return redirect('/them-doi-tac');
        }

    }

    public function delete_partner($partner_id) {

        $this->AuthLogin();

        $partner = PartnerModel::find($partner_id);
        $partner_image = $partner->partner_image;
        if($partner_image) {
            $path = 'public/uploads/partner/'.$partner_image;
            unlink($path);
        }
        $partner->delete();

        Session::put('message', 'Đã xóa đối tác thành công!');
        return redirect()->back();
    }
}
