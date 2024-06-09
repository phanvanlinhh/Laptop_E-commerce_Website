@extends('admin.layout')
@section('admin_content')
<h1 class="h3 mb-4 text-gray-800">Đối tác - khách hàng</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Thêm đối tác</h5>
    </div>
    <div class="container card-body">
        <form action="{{url('/luu-doi-tac')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label><strong>Tên đối tác</strong></label>
                <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập tên đối tác!"
                class="form-control" name="partner_name" placeholder="Tên đối tác...">
            </div>
            <div class="form-group">
                <label style="margin-bottom: 0;"><strong>Hình ảnh đối tác</strong></label>
                <small style="margin-top: 0;" class="form-text text-muted">Vui lòng thêm hình ảnh đối tác có kích thước 500 x 500</small>
                <input type="file" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng tải hình ảnh đối tác lên!"
                style="padding: .2rem .75rem;" class="form-control" name="partner_image">
            </div>
            <div class="form-group">
                <label><strong>Link Website (Facebook)</strong></label>
                <input type="text" class="form-control" name="partner_link" placeholder="Link Website hoặc Facebook...">
            </div>
            <button type="submit" name="add_partner" class="btn btn-grape">Thêm đối tác</button>
        </form>
    </div>
</div>
@endsection