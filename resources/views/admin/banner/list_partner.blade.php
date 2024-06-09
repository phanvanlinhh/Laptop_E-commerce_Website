@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Đối tác - khách hàng</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary">Danh sách Đối tác</h5>
            <div style="text-align: right;" class="col-md-6">
                <a class="btn btn-grape" href="{{url('/them-doi-tac')}}">Thêm đối tác</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <strong style="color: red; font-size: 14px;">
                <?php
                use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </strong>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Hình ảnh</th>
                        <th>Tên đối tác</th>
                        <th>Link Website/Facebook</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($list_partner as $key => $partner)
                    @php $i++; @endphp
                    <tr>
                        <th class="text-center-height text-center">{{$i}}</th>
                        <td style="padding: 12px 0px;" class="text-center"><img src="{{url('public/uploads/partner/'.$partner->partner_image)}}" width="100" height="100" alt="{{ $partner->partner_name}}"></td>
                        <td class="text-center-height">{{ $partner->partner_name}}</td>
                        <td class="text-center-height"><a href="{{ $partner->partner_link}}">{{ $partner->partner_link}}</a></td>
                        <td class="text-center-height text-center">
                            <a href="{{url('/xoa-doi-tac/'.$partner->partner_id)}}" onclick="return confirm('Bạn có chắn chắn xóa đối tác này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection