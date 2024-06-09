@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mã giảm giá</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mã giảm giá</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/insert-coupon-code')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="coupon_name">Tên mã giảm giá</label>
                <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Tên mã giảm giá...">
            </div>
            <div class="form-group">
                <label for="coupon_code">Mã giảm giá</label>
                <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Mã giảm giá...">
            </div>
            <div class="form-group">
                <label for="coupon_time">Số lượng</label>
                <input type="text" class="form-control" id="coupon_time" name="coupon_time" placeholder="Số lượng mã giảm giá...">
            </div>
            <div class="form-group">
                <label for="coupon_condition">Tính năng</label>
                <select id="coupon_condition" name="coupon_condition" class="form-control form-control-sm">
                    <option value="0">----Chọn----</option>
                    <option value="1">Giảm theo phần trăm</option>
                    <option value="2">Giảm theo tiền</option>
                </select>
            </div>
            <div class="form-group">
                <label for="coupon_number">Nhập số % hoặc số tiền giảm</label>
                <input type="text" class="form-control" id="coupon_number" name="coupon_number">
            </div>
            <button type="submit" name="add_coupon" class="btn btn-primary">Thêm mã giảm giá</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection