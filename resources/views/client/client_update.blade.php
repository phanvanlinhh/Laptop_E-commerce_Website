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
  $updated_at = $user['updated_at'];

  $status_update = session('status_update');
?>

<!-- Announce when update  successful -->
@if($status_update == 'success')
    <div class="announcement">
      <p>Thông tin của {{$name}} đã được cập nhật thành công vào lúc {{$updated_at}}</p>
    </div>
<?php Session::put('status_update',null); ?>
@endif

<div class=" checkout row">
  <div class=" checkout col-100">
    <div class=" checkout container">
      <form action="{{route('client.update.handle')}}" method="post">
        @csrf
        <div class=" checkout row">
          <div class=" checkout col-50">
            <h3>Thông tin tài khoản</h3>
            <label for="fname"><i class=" checkout fa fa-user"></i> Họ và Tên</label>
            <input type="text" id="fname" name="name" value="{{$name}}" placeholder="Nguyễn Văn A">
            <label for="email"><i class=" checkout fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="{{$email}}" placeholder="nguyenvana@gmail.com">
            <label for="password"><i class=" checkout fa fa-lock"></i> Mật khẩu</label>
            <input type="password" id="email" name="password" placeholder="Nhập lại mật khẩu hoặc sửa mật khẩu mới...">
            <label for="phone"><i class=" checkout fa fa-phone"></i> Phone</label>
            <input type="num" id="phone" name="phone" value="{{$phone}}" placeholder="0123456789">
            <label for="adr"><i class=" checkout fa fa-address-card-o"></i> Địa chỉ</label>
            <input type="text" id="adr" name="street_address" value="{{$street_address}}"  placeholder="470 Đường Trần Đại Nghĩa">

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
                <input type="text" id="zip" name="zip_code" value="{{$zip_code}}" placeholder="550000">
              </div>
            </div>
            
          </div>

          <div class=" checkout col-50">
            <h3>Phương thức thanh toán</h3>
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
            <input type="text" id="expmonth" name="exp_month" value="{{$exp_month}}" placeholder="Tháng 9">
            <div class=" checkout row">
              <div class=" checkout col-50">
                <label for="expyear">Năm hết hạn</label>
                <input type="text" id="expyear" name="exp_year" value="{{$exp_year}}" placeholder="2021">
              </div>
              <div class=" checkout col-50">
                <label for="cvv_cvc">Mã xác thực CVV</label>
                <input type="text" id="cvv_cvc" name="cvv_cvc" value="{{$cvv_cvc}}" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="Lưu thông tin" class=" checkout btn btn-grape">
      </form>
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
  margin: 10px 20px 30px 20px;
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

input[type=text],input[type=password],input[type=num] {
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

/*announcement when saved*/
.announcement {
  display: inline-block;
  height: 100%;
  text-align: center;
  width: 100%;
  background: #eba72a;
  color: white;
  margin: 0;
  padding: 0;
  vertical-align: middle;
  font-size: 1.5em;
}
</style>
@endsection