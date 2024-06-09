@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa danh mục sản phẩm</h6>
    </div>
    @foreach($edit_category_product as $key => $edit_value)
    <div class="container card-body">
        <form action="{{URL('/update-category-product/'.$edit_value->category_id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category_product_name">Tên danh mục</label>
                <input type="text" class="form-control" id="category_product_name" value="{{$edit_value->category_name}}" name="category_product_name" placeholder="Tên danh mục...">
            </div>
            <div class="form-group">
                <label for="category_product_desc">Mô tả danh mục</label>
                <textarea style="resize: none;" class="form-control" id="category_product_desc" name="category_product_desc" rows="3" placeholder="Mô tả danh mục...">{{$edit_value->category_desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="updated_at">Thời gian chỉnh sửa</label>
                <input type="datetime-local" class="form-control" id="updated_at" value="{{$edit_value->updated_at}}" name="updated_at" placeholder="Thời gian chỉnh sửa...">
            </div>
            <button type="submit" name="add_category_product" class="btn btn-primary">Cập nhật danh mục</button>
        </form>
    </div>
    @endforeach
</div>
<!-- Success Modal-->
@endsection