@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mã giảm giá</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách mã giảm giá</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p style="color: red; font-size: 14px;">
                <?php
                use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên mã giảm giá</th>
                        <th>Mã giảm giá</th>
                        <th>Số lượng</th>
                        <th>Tính năng</th>
                        <th>Số tiền hoặc % giảm</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupon as $key => $coupon_pro)
                    <tr>
                        <td>{{ $coupon_pro->coupon_name}}</td>
                        <td>{{ $coupon_pro->coupon_code}}</td>
                        <td>{{ $coupon_pro->coupon_time}}</td>
                        <td>
                            <?php
                                if ($coupon_pro->coupon_condition == 1)
                                echo 'Giảm theo phần trăm';
                                else
                                 echo 'Giảm theo tiền';
                            ?>
                        </td>
                        <td>
                            Giảm {{ number_format($coupon_pro->coupon_number,0,',','.')}}
                            <?php
                                if ($coupon_pro->coupon_condition == 1)
                                     echo ' %';
                                else echo ' VND'
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/delete-coupon/'.$coupon_pro->coupon_id)}}" onclick="return confirm('Bạn có chắn chắn xóa danh mục sản phẩm này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection