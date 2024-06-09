@extends('layout')
@section('content')

<?php
  use Illuminate\Support\Facades\Session;
  $user = Session::get('user');
  $name = $user['name'];
  $email = $user['email'];
  $phone = $user['phone'];
  $street_address = $user['street_address'];
  $ward_id = $user['ward_id'];
  $city_id = $user['city_id'];
  $district_id = $user['district_id'];
  $zip_code = $user['zip_code'];
  $credit_card_name = $user['credit_card_name'];
  $credit_card_num = $user['credit_card_num'];
  $exp_month = $user['exp_month'];
  $exp_year = $user['exp_year'];
  $cvv_cvc = $user['cvv_cvc'];
?>

<div class=" checkout row">
  <div class=" checkout col-75">
    <div class=" checkout container">
      <form action="{{route('checkout.handle')}}" method="post">
        @csrf
        <div class=" checkout row">
          <div class=" checkout col-50">
            <h3>Địa chỉ thanh toán</h3><hr>
            <label for="fname"><i class=" checkout fa fa-user"></i> Họ và Tên</label>
            <input type="text" id="fname" name="name" value="{{$name}}" placeholder="Nguyễn Văn A" required>
            <label for="email"><i class=" checkout fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="{{$email}}" placeholder="nguyenvana@gmail.com" required>
            <label for="phone"><i class=" checkout fa fa-phone"></i> Phone</label>
            <input type="num" id="phone" name="phone" value="{{$phone}}" placeholder="0123456789" required>
            <label for="adr"><i class=" checkout fa fa-address-card-o"></i> Địa chỉ</label>
            <input type="text" id="adr" name="street_address" value="{{$street_address}}"  placeholder="470 Đường Trần Đại Nghĩa" required>
            
            <div class=" checkout row">
              <div class=" checkout col-50">
                <label for="city"><i class=" checkout fa fa-institution"></i> Thành phố</label>
                <select id="city" name="city" class="form-control form-control-sm choose city" style="height: 50px;">
                    <!-- <option value="">---Chọn tỉnh/thành phố---</option> -->
                    @if($city_id == null)
                      <option value="">---Chọn tỉnh/thành phố---</option>
                    @endif
                    @foreach ($city as $key => $ci)
                        @if($ci->matp == $city_id)
                        <option value="{{ $ci->matp }}" selected>{{ $ci->name_city }}</option>
                        @else
                        <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
              <div class=" checkout col-50">
                <label for="province">Chọn quận/huyện</label>
                <select id="province" name="province" class="form-control form-control-sm choose province" style="height: 50px;">
                    <!-- <option value="">---Chọn quận/huyện---</option> -->
                    <option value="{{$district_id}}">
                    @if($district_id)
                      @foreach ($province as $key => $prov)
                        @if($prov->maqh == $district_id)
                          @php
                            echo $prov->name_quanhuyen;
                          @endphp
                        @endif
                      @endforeach
                    @else
                    ---Chọn quận/huyện---
                    @endif
                    </option>
                </select>
              </div>
            </div>

            <div class=" checkout row">
              <div class=" checkout col-50">
                <label for="wards">Chọn xã/phường</label>
                <select id="wards" name="wards" class="form-control form-control-sm wards" style="height: 50px;">
                    <!-- <option value="">---Chọn xã/phường---</option> -->
                    <option value="{{$ward_id}}">
                    @if($ward_id)
                      @foreach ($wards as $key => $ward)
                        @if($ward->xaid == $ward_id)
                          @php
                          echo $ward->name_xaphuong;
                          @endphp
                        @endif
                      @endforeach
                    @else
                    ---Chọn xã/phường---
                    @endif
                    </option>
                </select>
              </div>
              <div class=" checkout col-50">
                <label for="zip">Mã vận chuyển Zip</label>
                <input type="text" id="zip" name="zip_code" value="{{$zip_code}}" placeholder="550000" required>
              </div>
            </div>

          </div>

          <div class=" checkout col-50">
            <h3>Phương thức thanh toán</h3><hr>
            <div class="row">
              <div class="col-md-4">
                <input type="radio" name="payment_method" value="1" onclick="selectPayment1();" required /> Thẻ tín dụng
              </div>
              <div class="col-md-3">
                <input type="radio" name="payment_method" value="2" onclick="selectPayment2();" required /> Tiền mặt
              </div>
              <div class="col-md-5">
                <input type="radio" name="payment_method" value="3" onclick="selectPayment3();" required /> Cổng thanh toán
              </div>
            </div><hr>
            <div id="div0">
              <b style="color: red;">Chưa chọn phương thức thanh toán</b>
              <hr>
            </div>
            <div id="div1" style="display: none;">
              <b style="color: green;">Đã chọn thanh toán bằng THẺ TÍN DỤNG</b>
              <hr>
              <label for="fname">Loại được phép dùng</label>
              <div class=" checkout icon-container">
                <i class=" checkout fa fa-cc-visa" style="color:navy;"></i>
                <i class=" checkout fa fa-cc-amex" style="color:blue;"></i>
                <i class=" checkout fa fa-cc-mastercard" style="color:red;"></i>
                <i class=" checkout fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Tên trên thẻ</label>
              <input type="text" id="cname" name="credit_card_name" value="{{$credit_card_name}}" placeholder="NGUYEN VAN A">
              <label for="ccnum">Số thẻ tín dụng</label>
              <input type="text" id="ccnum" name="credit_card_num" value="{{$credit_card_num}}" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Tháng hết hạn</label>
              <input type="text" id="expmonth" name="exp_month" value="{{$exp_month}}" placeholder="Tháng 12">
              <div class=" checkout row">
                <div class=" checkout col-50">
                  <label for="expyear">Năm hết hạn</label>
                  <input type="text" id="expyear" name="exp_year" value="{{$exp_year}}" placeholder="2021">
                </div>
                <div class=" checkout col-50">
                  <label for="cvv_cvc">CVV/CVC</label>
                  <input type="text" id="cvv_cvc" name="cvv_cvc" value="{{$cvv_cvc}}" placeholder="123">
                </div>
              </div>
            </div>
            <div id="div2" style="display: none;">
              <b style="color: green;">Đã chọn thanh toán bằng TIỀN MẶT</b>
              <hr>
            </div>
            <div id="div3" style="display: none;">
              <b style="color: green;">Đã chọn thanh toán bằng CỔNG THANH TOÁN ONLINE</b>
              <hr>
            </div>

            <label for="note">Ghi chú đơn hàng</label>
            <textarea id="note" name="note" rows="4" placeholder="Ghi chú..."></textarea> 
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Địa chỉ giao hàng giống như thanh toán
        </label>
        <input type="submit" value="Thanh toán" class=" checkout btn btn-grape">
      </form>
    </div>
  </div>
  <div class=" checkout col-25">
    <div class=" checkout container">
      <h4>Giỏ hàng <span class=" checkout price" style="color:black"><i class=" checkout fa fa-shopping-cart"></i> </span></h4>
        @if(session('cart') == true)
            @php
                $total = 0;
                $count = 0;
            @endphp
            @foreach(session('cart') as $key => $cart)
                @php
                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                    $total += $subtotal;
                    $count += 1;
                @endphp
                <p><a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">{{$cart['product_name']}}</a> x {{$cart['product_qty']}} <span class=" checkout price">{{number_format($cart['product_qty'] * $cart['product_price'])}} VNĐ</span></p>
            @endforeach
        @else
            <hr><p class="text-center"><b>Giỏ hàng trống</b></p>
        @endif
        <hr>
        <p>Số sản phẩm: <span class=" checkout price" style="color:black">
            <b>{{$count}} loại</b></span></p>
        <hr>
        <p>Tổng: <span class=" checkout price" style="color:black"><b>{{number_format($total)}} VNĐ</b></span></p>
        <hr>
        @if (Session::get('coupon'))
          @foreach (Session::get('coupon') as $key => $cou)
              @if ($cou['coupon_condition']== 1)
                  <p>Giảm giá ({{$cou['coupon_number']}}%): 
                    <span class=" checkout price" style="color:black">
                      <b>
                      @php
                          $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                          $total_coupon = $total - $subtotal_coupon;
                      @endphp
                      {{number_format($subtotal_coupon)}} VNĐ
                      </b></span>
                  </p>
              @else
                  <p>Giảm giá: <span class=" checkout price" style="color:black"><b>
                      @php
                          $total_coupon = ($total - $cou['coupon_number']);
                      @endphp
                      {{number_format($cou['coupon_number'])}} VNĐ
                      </b></span>
                  </p>
              @endif
          @endforeach
          <hr>
        @endif
        <p>Thành tiền: <span class=" checkout price" style="color:red"><b>
          @if (Session::get('coupon'))
            {{number_format($total_coupon)}} VNĐ
          @else
            {{number_format($total)}} VNĐ
          @endif
          </b></span></p>
    </div>
  </div>
</div>

<style>
body.checkout {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

*.checkout {
  box-sizing: border-box;
}

.row.checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 10px;
}

.col-25.checkout {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50.checkout {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container.checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=num],textarea {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container.checkout {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn.checkout {
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .checkout.row {
    flex-direction: column-reverse;
  }
  .checkout.col-25 {
    margin-bottom: 20px;
  }
}
</style>

<!-- Function select Payment way -->
<script type="text/javascript">
function selectPayment1(){
  document.getElementById('div1').style.display ='block';
  document.getElementById('div2').style.display ='none';
  document.getElementById('div3').style.display = 'none';
  document.getElementById('div0').style.display ='none';
}
function selectPayment2(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display = 'block';
  document.getElementById('div3').style.display = 'none';
  document.getElementById('div0').style.display ='none';
}
function selectPayment3(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display = 'none';
  document.getElementById('div3').style.display = 'block';
  document.getElementById('div0').style.display ='none';
}
</script>
@endsection