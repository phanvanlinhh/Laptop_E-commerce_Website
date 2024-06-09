@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Vận chuyển</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm vận chuyển</h6>
    </div>
    <div class="container card-body">
        <form>
            @csrf
            
            <div class="form-group">
                <label for="city">Chọn tỉnh/thành phố</label>
                <select id="city" name="city" class="form-control form-control-sm choose city">
                    <option value="">---Chọn tỉnh/thành phố---</option>
                    @foreach ($city as $key => $ci)
                        <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="province">Chọn quận/huyện</label>
                <select id="province" name="province" class="form-control form-control-sm choose province">
                    <option value="">---Chọn quận/huyện---</option>
                </select>
            </div>
            <div class="form-group">
                <label for="wards">Chọn xã/phường</label>
                <select id="wards" name="wards" class="form-control form-control-sm wards">
                    <option value="">---Chọn xã/phường---</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fee_ship">Phí vận chuyển</label>
                <input type="text" class="form-control fee_ship" id="fee_ship" name="fee_ship" placeholder="Phí vận chuyển...">
            </div>
            <button type="button" name="add_delivery" class="btn btn-primary add_delivery">Thêm phí vận chuyển</button>
        </form>
    </div>
    <div id="load_delivery">
        
    </div>
</div>
<!-- Success Modal-->
@endsection