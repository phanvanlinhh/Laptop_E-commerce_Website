@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tài khoản</h1>
<p class="mb-4">
    <p style="color: red; font-size: 14px;">
        <?php
        use Illuminate\Support\Facades\Session;
        $message = Session::get('message');
        if ($message) {
            echo $message;
            Session::put('message', null);
        }
        ?>
    </p></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản</h6>
    </div>
    <div class="container card-body">
        <form action="{{route('user.add.handle')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="name">Tên tài khoản</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên tài khoản...">
                    </div>
                    <div class="col-md-3">
                        <label for="remember_token">Vai trò</label>
                        <select id="remember_token" name="remember_token" class="form-control form-control-sm">
                            <option value="1">Nhân viên</option>
                            <option value="">Khách hàng</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status">Trạng thái</label>
                        <select id="status" name="status" class="form-control form-control-sm">
                            <option value="unlocked">Không khoá</option>
                            <option value="locked">khoá</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu...">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@email.com...">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone">Số điện thoại</label>
                        <input type="num" class="form-control" id="phone" name="phone" placeholder="0123456789...">
                    </div>
                    <div class="col-md-6">
                        <label for="street_address">Địa chỉ</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Địa chỉ...">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="district">Quận/Huyện</label>
                        <input type="text" class="form-control" id="district" name="district" placeholder="Quận/Huyện...">
                    </div>
                    <div class="col-md-6">
                        <label for="city">Tỉnh/Thành</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Tỉnh/Thành...">
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button type="submit" name="add_user" class="btn btn-grape">Thêm tài khoản</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection