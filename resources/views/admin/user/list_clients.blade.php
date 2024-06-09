@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tài khoản khách hàng</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản khách hàng</h6>
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
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Xã/ Phường</th>
                        <th>Quận/ Huyện</th>
                        <th>Tỉnh/ Thành</th>
                        <th class="text-center">Thao tác</th>
                        <th class="text-center">Khoá tài khoản</th>
                        <th>Thời gian thêm</th>
                        <th>Sửa lần cuối</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_clients as $key => $client)
                    <tr>
                        <td>{{ $client->name}}</td>
                        <td>{{ $client->email}}</td>
                        <td>{{ $client->phone}}</td>
                        <td>{{ $client->street_address}}</td>
                        <td>
                            @foreach ($wards as $key => $ward)
                                @if($ward->xaid == $client->ward_id)
                                    @php
                                        echo $ward->name_xaphuong;
                                    @endphp
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($province as $key => $prov)
                                @if($prov->maqh == $client->district_id)
                                    @php
                                        echo $prov->name_quanhuyen;
                                    @endphp
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($city as $key => $ci)
                                @if($ci->matp == $client->city_id)
                                    @php
                                        echo $ci->name_city;
                                    @endphp
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/update-user/'.$client->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-user/'.$client->id)}}" onclick="return confirm('Bạn có chắn chắn xóa tài khoản khách hàng này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        <td class="text-center">
                            <?php if($client->status == 'locked') { ?>
                                <a href="{{URL('/unlock-user/'.$client->id)}}"><i class="fa-2x fas fa-lock text-danger"></i></a>
                            <?php } else { ?>
                                <a href="{{URL('/lock-user/'.$client->id)}}"><i class="fa-2x fas fa-unlock text-default"></i></a>
                            <?php } ?>
                        </td>
                        <td>{{ $client->created_at}}</td>
                        <td>
                        <?php if($client->updated_at == '') { ?>
                                {{ $client->created_at}}
                            <?php } else { ?>
                                {{ $client->updated_at}}
                            <?php } ?>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection