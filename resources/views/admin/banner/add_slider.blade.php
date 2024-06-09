@extends('admin.layout')
@section('admin_content')
<h1 class="h3 mb-4 text-gray-800">Quản lý Slider</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Thêm Slide</h5>
    </div>
    <div class="container card-body">
        <form action="{{url('/luu-slider')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label><strong>Tên Slide</strong></label>
                <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập tên Slide!"
                class="form-control" name="slider_name" placeholder="Tên Slide...">
            </div>
            <div class="form-group">
                <label style="margin-bottom: 0;"><strong>Hình ảnh Slide</strong></label>
                <small style="margin-top: 0;" class="form-text text-muted">Vui lòng thêm hình ảnh Slide có kích thước 1365 x 467</small>
                <input type="file" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng tải hình ảnh Slide lên!"
                style="padding: .2rem .75rem;" class="form-control" name="slider_image">
            </div>
            <button type="submit" name="add_slider" class="btn btn-grape">Thêm Slide</button>
        </form>
    </div>
</div>
@endsection