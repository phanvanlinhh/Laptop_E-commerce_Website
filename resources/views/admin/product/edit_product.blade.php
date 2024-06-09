@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa sản phẩm</h6>
    </div>
    <div class="container card-body">
        @foreach($edit_product as $key => $pro)
        <form action="{{URL('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{$pro->product_name}}" placeholder="Tên sản phẩm...">
            </div>
            <div class="form-group">
                <label for="product_image">Hình ảnh sản phẩm</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="product_image" name="product_image">
                <img src="{{URL('public/uploads/product/'.$pro->product_image)}}" alt="{{$pro->product_name}}" width="100" height="100">
            </div>
            <div class="form-group">
                <label for="product_cate">Danh mục sản phẩm</label>
                <select id="product_cate" name="product_cate" class="form-control form-control-sm">
                @foreach($cate_product as $key => $cate)
                    @if($cate->category_id==$pro->category_id)
                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @else
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_price">Giá sản phẩm</label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="{{$pro->product_price}}" placeholder="Giá sản phẩm...">
            </div>
            <div class="form-group">
                <label for="product_desc">Mô tả sản phẩm</label>
                <textarea style="resize: none;" class="form-control" id="product_desc" name="product_desc" rows="3" placeholder="Mô tả sản phẩm...">{{$pro->product_desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="product_parameters">Thông số</label>
                <input type="text" class="form-control" id="product_parameters" name="product_parameters" value="{{$pro->product_parameters}}" placeholder="Thông số...">
            </div>
            <div class="form-group">
                <!-- <label for="product_content">Đặc điểm sản phẩm</label> -->
                <textarea style="resize: none;" class="form-control" id="product_content" name="product_content" rows="3">{{$pro->product_content}}</textarea>
            </div>
            <div class="form-group">
                <!-- <label for="product_details">Chi tiết sản phẩm</label> -->
                <textarea style="resize: none;" class="form-control" id="product_details" name="product_details" rows="3">{{$pro->product_details}}</textarea>
            </div>
            <button type="submit" name="add_product" class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
        @endforeach
    </div>
</div>
<!-- Success Modal-->
@endsection