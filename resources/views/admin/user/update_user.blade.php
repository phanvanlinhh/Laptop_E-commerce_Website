@extends('admin.layout')
@section('admin_content')

<?php
  use Illuminate\Support\Facades\Session;
  $user = session('user');
  $name = $user['name'];
  $email = $user['email'];
  $phone = $user['phone'];
  $street_address = $user['street_address'];
  $city = $user['city'];
  $district = $user['district'];
  $status = $user['status'];
  $remember_token = $user['remember_token'];
  $zip_code = $user['zip_code'];
  $credit_card_name = $user['credit_card_name'];
  $credit_card_num = $user['credit_card_num'];
  $exp_month = $user['exp_month'];
  $exp_year = $user['exp_year'];
  $cvv_cvc = $user['cvv_cvc'];
?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tài khoản</h1>
<p class="mb-4">
    <p style="color: red; font-size: 14px;">
        <?php
        $message = session('message');
        if ($message) {
            echo $message;
            Session::put('message', null);
        }
        ?>
    </p></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin tài khoản: {{$name}}</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL::to('/update-user-handle/'.$user['id'])}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="name">Tên tài khoản</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên tài khoản..." value="{{$name}}">
                    </div>
                    <div class="col-md-3">
                        <label for="remember_token">Vai trò</label>
                        <select id="remember_token" name="remember_token" class="form-control form-control-sm">
                            @if($remember_token == 1)
                                <option value="1">Nhân viên</option>
                                <option value="">Khách hàng</option>
                            @else
                                <option value="">Khách hàng</option>
                                <option value="1">Nhân viên</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status">Trạng thái</label>
                        <select id="status" name="status" class="form-control form-control-sm">
                            @if($status == 'unlocked')
                                <option value="unlocked">Không khoá</option>
                                <option value="locked">khoá</option>
                            @else
                                <option value="locked">khoá</option>
                                <option value="unlocked">Không khoá</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập lại mật khẩu hoặc mật khẩu mới...">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@email.com..." value="{{$email}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="num" class="form-control" id="phone" name="phone" placeholder="0123456789..." value="{{$phone}}">
                    </div>
                    <div class="col-md-6">
                        <label for="street_address">Địa chỉ</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Địa chỉ..." value="{{$street_address}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="district">Quận/Huyện</label>
                        <input type="text" class="form-control" id="district" name="district" placeholder="Quận/Huyện..." value="{{$district}}">
                    </div>
                    <div class="col-md-6">
                        <label for="city">Tỉnh/Thành</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Tỉnh/Thành..." value="{{$city}}">
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button type="submit" name="update_user" class="btn btn-grape">Sửa tài khoản</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection