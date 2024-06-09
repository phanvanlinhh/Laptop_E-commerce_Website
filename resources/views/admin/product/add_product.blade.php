@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/save-product')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm...">
            </div>
            <div class="form-group">
                <label for="product_image">Hình ảnh sản phẩm</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="product_image" name="product_image">
            </div>
            <div class="form-group">
                <label for="product_cate">Danh mục sản phẩm</label>
                <select id="product_cate" name="product_cate" class="form-control form-control-sm">
                @foreach($cate_product as $key => $cate)
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_price">Giá sản phẩm</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Giá sản phẩm...">
            </div>
            <div class="form-group">
                <label for="product_parameters">Thông số</label>
                <input type="text" class="form-control" id="product_parameters" name="product_parameters" placeholder="Thông số...">
            </div>
            <div class="form-group">
                <label for="product_desc">Mô tả sản phẩm</label>
                <textarea style="resize: none;" class="form-control" id="product_desc" name="product_desc" rows="3" placeholder="Mô tả sản phẩm..."></textarea>
            </div>
            <div class="form-group">
                <!-- <label for="product_content">Đặc điểm sản phẩm</label> -->
                <label for="product_content"></label>
                <textarea style="resize: none;" class="form-control" id="product_content" name="product_content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <!-- <label for="product_details">Chi tiết sản phẩm</label> -->
                <label for="product_details"></label>
                <textarea style="resize: none;" class="form-control" id="product_details" name="product_details" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="product_status">Tình trạng</label>
                <select id="product_status" name="product_status" class="form-control form-control-sm">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
                </select>
            </div>
            <button type="submit" name="add_product" class="btn btn-grape">Thêm sản phẩm</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection