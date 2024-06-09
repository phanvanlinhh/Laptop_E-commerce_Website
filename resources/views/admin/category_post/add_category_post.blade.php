@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh mục bài viết</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục bài viết</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/save-category-post')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="category_post_name">Tên danh mục</label>
                    <input type="text" class="form-control" id="category_post_name" name="category_post_name" placeholder="Tên danh mục...">
                </div>
                <div class="form-group col-md-4">
                    <label for="category_post_status">Tình trạng</label>
                    <select id="category_post_status" name="category_post_status" class="form-control form-control-sm">
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="category_post_desc">Mô tả danh mục</label>
                <textarea style="resize: none;" class="form-control" id="category_post_desc" name="category_post_desc" rows="3" placeholder="Mô tả danh mục..."></textarea>
            </div>
            <button type="submit" name="add_category_post" class="btn btn-grape">Thêm danh mục</button>
        </form>
    </div>
</div>
<!-- Success Modal-->
@endsection