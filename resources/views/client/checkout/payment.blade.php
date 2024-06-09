@extends('layout')
@section('content')
<style>
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
</style>
<div class="container mb-4">
    <div class="row table-responsive">
        <div class="col-12">
            <div class="table-responsive">
                <div class="row">
                    <p class="col-md-8" style="color: red; font-size: 14px;">
                        <?php
                        use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                    </p>
                    @if(Session::get('cart') == true)
                    <div style="text-align: right;" class="col-md-4">
                        <a href="{{url('/')}}" class="btn btn-apple text-white">Trở lại mua sắm</a>
                        <a class="btn btn-danger" href="{{url('/del-all-pro')}}">Xóa giỏ hàng</a>
                    </div>
                    @endif
                </div>
                <table class="table table-striped">
                <form class="row" action="{{url('/update-cart')}}" method="post">
                        @csrf
                        <thead>
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th style="text-align: right;" scope="col">Thành tiền</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::get('cart') == true)
                            @php
                                $total = 0;
                            @endphp
                            @foreach(Session::get('cart') as $key => $cart)
                                @php
                                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                                    $total += $subtotal;
                                @endphp
                            <tr>
                                <td>
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">
                                        <img src="{{asset('/public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="50" height="50">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">
                                        <b>{{$cart['product_name']}}</b>
                                    </a>
                                </td>
                                <td>{{number_format($cart['product_price'],0,',','.')}} VNĐ</td>
                                <td style="justify-content: center;">
                                    <input style="width: 60px; margin-right: 4px;" class="form-control tex-center cart_quantity"
                                    type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                </td>
                                <td style="text-align: right;">{{number_format($subtotal, 0, ',', '.')}} VNĐ</td>
                                <td class="text-center"><a href="{{url('/del-product/'.$cart['session_id'])}}"><i style="font-size: 24px;" class="text-danger fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach        
                        </tbody>
                            @else
                                <tr>
                                    <td class="text-center text-danger" colspan="6"><strong>Giỏ hàng rỗng!</strong></td>
                                </tr>        
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: center;" colspan="6">
                                    <a href="{{url('/')}}" class="btn btn-apple text-white">Hãy mua sắm nào !</a>
                                </td>
                             </tr>
                        </tfoot>
                            @endif

                        @if(Session::get('cart') == true)
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                <strong style="color: red; font-size: 14px;">
                                    <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo $message;
                                        Session::put('message', null);
                                    }
                                    ?>
                                </strong>
                                </td>
                                <th style="text-align: right;">Tổng tiền:</th>
                                <th style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                                <td class="text-center"><input type="submit" value="Cập nhật" name="update_qty" class="btn btn-grape"></td>
                            </tr>
                        </tfoot>
                        @endif
                    </form>
                </table>
            </div>
        </div>
        @if(Session::get('cart') == true)
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-7 mb-5">
                    <!-- Shipping info -->
                    <table class="table table-bordered">
                       <!-- <thead>
                         <tr>
                           <th scope="col">#</th>
                           <th scope="col">First</th>
                         </tr>
                       </thead> -->
                        <?php
                           $data = session('data');
                        ?>
                       <tbody>
                           <tr>
                              <th scope="row">Thanh toán</th>
                              <td>
                                 <?php
                                    if($data['shipping_method'] == 2) {
                                       echo 'Thanh toán sau khi nhận hàng';
                                    } else {
                                       echo 'Thanh toán ngay khi đặt hàng';
                                    }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Tên người nhận</th>
                              <td>{{$data['shipping_name']}}</td>
                           </tr>
                           <tr>
                              <th scope="row">Số điện thoại</th>
                              <td>{{$data['shipping_phone']}}</td>
                           </tr>
                           <tr>
                              <th scope="row">Email người nhận</th>
                              <td>{{$data['shipping_email']}}</td>
                           </tr>
                           <tr>
                              <th scope="row">Địa chỉ giao hàng</th>
                              <td>{{$data['shipping_address']}}, 
                                 @foreach (session('wards') as $key => $ward)
                                    @if($ward->xaid == $data['shipping_ward_id'])
                                       @php
                                       echo $ward->name_xaphuong;
                                       @endphp
                                    @endif
                                 @endforeach
                                 , 
                                 @foreach (session('province') as $key => $prov)
                                    @if($prov->maqh == $data['shipping_district_id'])
                                       @php
                                       echo $prov->name_quanhuyen;
                                       @endphp
                                    @endif
                                 @endforeach
                                 , 
                                 @foreach (session('city') as $key => $ci)
                                    @if($ci->maqh == $data['shipping_city_id'])
                                       @php
                                       echo $ci->name_quanhuyen;
                                       @endphp
                                    @endif
                                 @endforeach
                              </td>
                           </tr>
                           <tr>
                              <th scope="row">Ghi chú đơn hàng</th>
                              <td>
                                 @php
                                 if($data['shipping_notes'] == null) {
                                    echo '(Không có)';
                                 } else echo $data['shipping_notes'];
                                 @endphp
                              </td>
                           </tr>
                       </tbody>
                     </table>
                </div>
                <div class="col-md-1"></div>
                <div class="col-sm-12 col-md-4">
                    <table>
                        <tr>
                            <th>Tổng tiền hàng:</th>
                            <th style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                        </tr>
                        @if (Session::get('coupon'))
                            @foreach (Session::get('coupon') as $key => $cou)
                                @if ($cou['coupon_condition']== 1)
                                    <tr>
                                        <th>Giảm giá (Giảm {{$cou['coupon_number']}}%):</th>
                                        @php
                                            $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                                            $total_coupon = $total - $subtotal_coupon;
                                        @endphp
                                        <th style="text-align: right;">{{number_format($subtotal_coupon, 0, ',', '.')}} VNĐ</th>
                                    </tr>
                                @else
                                    <tr>
                                        <th>Giảm giá:</th>
                                        @php
                                            $total_coupon = ($total - $cou['coupon_number']);
                                        @endphp
                                        <th style="text-align: right;">{{number_format($cou['coupon_number'], 0, ',', '.')}} VNĐ</th>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        <tr>
                            <th class="text-danger text-uppercase">Tổng thanh toán:&emsp;</th>
                            @if (Session::get('coupon'))
                            <th class="text-danger" style="text-align: right;">{{number_format($total_coupon, 0, ',', '.')}} VNĐ</th>
                            @else
                            <th class="text-danger" style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                            @endif
                        </tr>
                        <tr>
                           <th style="text-align: center;" colspan="3" class="mt-2">
                              <hr>
                              @if($data['shipping_method'] == 2)
                                 <a href="{{route('order.place')}}" class="btn btn-grape col-md-12">
                                    Xác nhận mua hàng</a>
                                 <hr>
                                 Nhấn xác nhận để đặt hàng và trả phí sau khi nhận hàng
                              @else
                                 @if($data['shipping_method'] == 3)
                                    @if(Session::get('coupon'))
                                       @php
                                       $vnd_to_usd = $total_coupon/23000;
                                       @endphp
                                    @else
                                       @php
                                       $vnd_to_usd = $total/23000;
                                       @endphp
                                    @endif
                                    <div id="paypal-button"></div>
                                    <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                 @else
                                    <a href="{{route('order.place')}}" class="btn btn-grape col-md-12">
                                       Xác nhận mua hàng</a>
                                    <hr>
                                    Nhấn xác nhận để đặt hàng và trả phí ngay khi đặt hàng bằng thẻ ATM
                                 @endif
                              @endif
                           </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
   var usd = document.getElementById('vnd_to_usd').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AXFw73NvqsIrku_CExjG163IhMzOoJi2cHxyKsJ5k8lONI1j3tiLXVaeUELjJlSP0u78OPLhRTYn63Zl',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn quý khách đã mua hàng!');
        location.replace("{{route('order.place')}}");
      });
    }
  }, '#paypal-button');

</script>
@endsection