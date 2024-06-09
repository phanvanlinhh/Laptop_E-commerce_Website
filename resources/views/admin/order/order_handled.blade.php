@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng đã xử lí</h6>
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
                        <th class="text-center">Xử lí đơn</th>
                        <th>Mã đơn</th>
                        <th>Thời gian thêm</th>
                        <th>Tổng thanh toán</th>
                        <th>Khuyến mãi</th>
                        <th>Phương thức</th>
                        <th>Người nhận</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Xã/ Phường</th>
                        <th>Quận/ Huyện</th>
                        <th>Tỉnh/ Thành</th>
                        <th>Mã Vận Chuyển</th>
                        <th>Ghi chú</th>
                        <th>Sửa lần cuối</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_orders_waiting as $key => $order)
                    <tr>
                        <td class="text-center">
                            <?php if($order->order_status == '0') { ?>
                                <a href="{{URL('/order-handling/'.$order->id)}}"><i class="fa-2x fas fa-shopping-cart text-warning"></i></a>
                            <?php } else { ?>
                                <a href="{{URL('/order-handled/'.$order->id)}}"><i class="fa-2x fas fa-archive text-success"></i></a>
                            <?php } ?>
                        </td>
                        <td>{{ $order->id}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>{{number_format($order->order_total)}} VNĐ</td>
                        <td>{{number_format($order->order_coupon)}} VNĐ</td>
                        <td>
                            @foreach(session('s_payments') as $key => $payment)
                                @if($payment->id == $order->payment_id)
                                    @if($payment->payment_status == 'Chưa thanh toán')
                                        <span style="color: red;">
                                            {{$payment->payment_status}}
                                        </span>
                                    @else
                                        <span style="color: green;">
                                            {{$payment->payment_status}}
                                        </span>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        @foreach(session('shippings') as $key => $shipping)
                            @if($shipping->id == $order->shipping_id)
                                <td>{{ $shipping->shipping_name}}</td>
                                <td>{{ $shipping->shipping_phone}}</td>
                                <td>{{ $shipping->shipping_email}}</td>
                                <td>{{ $shipping->shipping_address}}</td>
                                <td>
                                    @foreach ($wards as $key => $ward)
                                        @if($ward->xaid == $shipping->shipping_ward_id)
                                            @php
                                                echo $ward->name_xaphuong;
                                            @endphp
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($province as $key => $prov)
                                        @if($prov->maqh == $shipping->shipping_district_id)
                                            @php
                                                echo $prov->name_quanhuyen;
                                            @endphp
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($city as $key => $ci)
                                        @if($ci->matp == $shipping->shipping_city_id)
                                            @php
                                                echo $ci->name_city;
                                            @endphp
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{$shipping->shipping_zip_code}}
                                </td>
                                <td>
                                    {{$shipping->shipping_notes}}
                                </td>
                            @endif
                        @endforeach
                        <td>
                        <?php if($order->updated_at == '') { ?>
                                {{ $order->created_at}}
                            <?php } else { ?>
                                {{ $order->updated_at}}
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/update-user/'.$order->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-user/'.$order->id)}}" onclick="return confirm('Bạn có chắn chắn xóa tài khoản khách hàng này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection