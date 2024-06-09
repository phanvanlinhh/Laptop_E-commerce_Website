@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
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
                        <th style="width: 80px;" class="text-center">Hình sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Thông số</th>
                        <th>Giá</th>
                        <th class="text-center">Tình trạng</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_product as $key => $pro)
                    <tr>
                        <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/product/'.$pro->product_image)}}" width="80" height="80" alt="{{ $pro->product_name}}"></td>
                        <td>{{ $pro->product_name}}</td>
                        <td>{{ $pro->category_name}}</td>
                        <td>{{ $pro->product_parameters}}</td>
                        <td>{{number_format($pro->product_price,0,',','.')}} VNĐ</td>
                        <td class="text-center">
                            <?php if($pro->product_status == 0) { ?>
                                <a href="{{URL('/unactive-product/'.$pro->product_id)}}">
                                    <i class="fa-2x fas fa-times text-danger" title="Hết hàng"></i>
                                </a>
                            <?php } else { ?>
                                <a href="{{URL('/active-product/'.$pro->product_id)}}">
                                    <i class="fa-2x fas fa-check text-success" title="Còn hàng"></i>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-product/'.$pro->product_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-product/'.$pro->product_id)}}" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection