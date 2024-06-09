@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/save-category-product')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category_product_name">Tên danh mục</label>
                <input type="text" class="form-control" id="category_product_name" name="category_product_name" placeholder="Tên danh mục...">
            </div>
            <div class="form-group">
                <label for="category_product_desc">Mô tả danh mục</label>
                <textarea style="resize: none;" class="form-control" id="category_product_desc" name="category_product_desc" rows="3" placeholder="Mô tả danh mục..."></textarea>
            </div>
            <div class="form-group">
                <label for="created_at">Thời gian thêm</label>
                <input type="date" class="form-control" id="created_at" name="created_at" placeholder="Thời gian thêm danh mục...">
            </div>
            <div class="form-group">
                <label for="category_product_status">Tình trạng</label>
                <select id="category_product_status" name="category_product_status" class="form-control form-control-sm">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <button type="submit" name="add_category_product" class="btn btn-grape">Thêm danh mục</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection