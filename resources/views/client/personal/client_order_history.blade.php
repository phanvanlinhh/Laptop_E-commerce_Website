@extends('layout')
@section('content')
<?php
  use Illuminate\Support\Facades\Session;
  $user = Session::get('user');
  Session::put('user',null);
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

  $status = session('status');
  Session::put('status',null);

  foreach ($city as $key => $ci) {
  	if($ci->matp == $city_id) $city_name = $ci->name_city;
  }
  foreach ($province as $key => $prov) {
  	if($prov->maqh == $district_id) $district_name = $prov->name_quanhuyen;
  }
  foreach ($wards as $key => $ward) {
  	if($ward->xaid == $ward_id) $ward_name = $ward->name_xaphuong;
  }
?>
<div class="container">
    <div class="main-body">
    
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Người dùng</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

		<div class="row gutters-sm">
		   <div class="col-md-12 mb-3">
		      <div class="card">
		         <div class="card-header">
		            <b> Chi tiết lịch sử mua hàng</b>
		         </div>
		         <div class="card-body">
		            <div class="row table-responsive">
		               <table class="table table-striped ">
		                  <thead>
		                     <tr>
		                        <th scope="col">#</th>
		                        <th scope="col">Mã đơn</th>
		                        <th scope="col">Đặt hàng lúc</th>
		                        <th scope="col">Tổng </th>
		                        <th scope="col">Thanh toán</th>
		                        <th scope="col">Tình trạng</th>
		                        <th scope="col">Xem thêm</th>
		                     </tr>
		                  </thead>
		                  <tbody>
		                     @if(session('orders') != null)
			                     @php
			                     	$count = 0;
			                     @endphp
			                     @foreach(session('orders') as $key => $order)
				                     @php
				                     	$count++;
				                     @endphp
				                     <tr>
				                        <th scope="row">{{$count}}</th>
				                        <td>{{$order->id}}</td>
				                        <td>{{$order->created_at}}</td>
				                        <td>{{number_format($order->order_total)}} VNĐ</td>
				                        <td>
				                           @foreach(session('s_payments') as $key => $s_payment)
					                           @if($order->payment_id == $s_payment->id)
					                           	{{$s_payment->payment_status}}
					                           @endif
				                           @endforeach
				                        </td>
				                        <td>
				                           @switch($order->order_status)
					                           @case(0)
					                           	Chờ shop xử lí
					                           	@break
					                           @case(1)
					                           	Shop đã xử lí nhưng chưa giao
					                           	@break
					                           @case(2)
					                           	Đang giao
					                           	@break
					                           @case(3)
					                           	Đã đến nơi...
					                           	@break
					                           @case(4)
					                           	Đã hoàn thành...
					                           	@break
					                           @default
					                           	Lỗi...
				                           @endswitch
				                        </td>
				                        <td>
				                           @if(session('order_details'))
						                          @foreach(session('order_details') as $key => $order_detail)
						                           @if($order_detail->order_id == $order->id)
							                           <!-- Popup Button -->
							                           <button class="btn btn-primary" id="open{{$order->id}}" name="Open" onclick="popupOpen({{$order->id}});"><i class="fa fa-caret-down"></i></button>
							                           <button name="Close" id="close{{$order->id}}" class="btn btn-primary" onclick="popupClose({{$order->id}});" style="display: none;"><i class="fa fa-caret-up"></i></button>
							                           @break
						                           @endif
					                           @endforeach
					                         @else
					                           lỗi k có
				                           @endif
				                        </td>
				                     </tr>
				                     <tr>
				                        <td colspan="7">
				                           <div class="row">
				                              <div class="col-md-12 table-responsive" id="mainpopup{{$order->id}}">
				                              	<table id="maintable{{$order->id}}" class="table table-bordered" style="display:none;">
												  <thead>
												    <tr>
												      <th scope="col">Phương thức</th>
												      <th scope="col">Ghi chú</th>
												      <th scope="col">Người nhận</th>
												      <th scope="col">SĐT</th>
												      <th scope="col">Email</th>
												      <th scope="col">Địa chỉ</th>
												    </tr>
												  </thead>
												  <tbody>
												  @if(session('shippings'))
												  	@foreach(session('shippings') as $key => $shipping)
												  		@if($shipping->id == $order->shipping_id)
													    <tr>
													      <th scope="row" style="color: green;">
													      	@switch($shipping->shipping_method)
									                           @case(1)
									                           	Thẻ ATM
									                           	@break
									                           @case(2)
									                           	Tiền mặt trả sau
									                           	@break
									                           @case(3)
									                           	Cổng thanh toán online
									                           	@break
									                           @default
									                           	Lỗi...
								                           @endswitch
													      </th>
													      <td>
													      	@if($shipping->shipping_notes)
													      		{{$shipping->shipping_notes}}
													      	@else
													      		(không có)
													      	@endif
													      </td>
													      <td>{{$shipping->shipping_name}}</td>
													      <td>{{$shipping->shipping_phone}}</td>
													      <td>{{$shipping->shipping_email}}</td>
													      <td>{{$shipping->shipping_address}}, 
													      	@foreach($wards as $key => $ward)
													      		@if($ward->xaid == $shipping->shipping_ward_id)
													      			{{$ward->name_xaphuong}}
													      		@endif
													      	@endforeach
													      	, 
													      	@foreach($province as $key => $prov)
													      		@if($prov->maqh == $shipping->shipping_district_id)
													      			{{$prov->name_quanhuyen}}
													      		@endif
													      	@endforeach
													      	, 
													      	@foreach($city as $key => $ci)
													      		@if($ci->matp == $shipping->shipping_city_id)
													      			{{$ci->name_city}}
													      		@endif
													      	@endforeach
													      </td>
													    </tr>
													    @endif
												    @endforeach
												   @else
												   		<tr><td colspan="6" class="text-center">
												   				Lỗi</td></tr>
												   @endif
												  </tbody>
												</table>
				                              </div>
				                           </div>
				                           <div class="row">
				                              <div class="col-md-12">
				                              	<!-- Popup -->
							                           @php
							                           $d_count = 0;
							                           @endphp
							                           <div class="col-md-12 table-responsive" id="popup{{$order->id}}">
							                              <table id="table{{$order->id}}" class="table table-bordered" style="display:none;">
							                                 <thead>
							                                    <tr>
							                                       <th colspan="4">
							                                          Chi tiết đơn hàng (mã: {{$order->id}} 
							                                          @if($order->order_coupon)
							                                          	| giảm: {{number_format($order->order_coupon)}} VNĐ 
							                                          @endif
							                                          )
							                                       </th>
							                                    </tr>
							                                    <tr>
							                                       <th scope="col">#</th>
							                                       <th scope="col">Tên sản phẩm</th>
							                                       <th scope="col">Giá</th>
							                                       <th scope="col">SL</th>
							                                    </tr>
							                                 </thead>
							                                 <tbody>
							                                    @foreach(session('order_details') as $key => $order_detail)
								                                    @if( $order_detail->order_id == $order->id)
									                                    @php
									                                    	$d_count++;
									                                    @endphp
									                                    <tr>
									                                       <th scope="row">{{$d_count}}</th>
									                                       <td>{{$order_detail->product_name}}</td>
									                                       <td>{{number_format($order_detail->product_price)}} VNĐ</td>
									                                       <td>{{$order_detail->product_sales_quantity}}</td>
									                                    </tr>
								                                    @endif
							                                    @endforeach
							                                 </tbody>
							                              </table>
							                           </div>
							                           @php
							                           	$d_count = 0;
							                           @endphp
				                              </div>
				                           </div>
				                        </td>
				                     </tr>
			                     @endforeach
			                     @php
			                     	$count = 0;
			                     @endphp
			                   @else
			                     <tr>
			                        <td colspan="5">Quý khách chưa đặt đơn hàng nào!</td>
			                     </tr>
		                     @endif
		                  </tbody>
		               </table>
		            </div>
		         </div>
		         <div class="card-footer">
		         		<div class="row">
		         			<div class="col-md-12 text-center">
		         				<!-- {{session('orders')->links()}} -->
		         				@if (session('orders')->hasPages())
								<nav aria-label="Page navigation example">
								    <ul class="pagination justify-content-center">
								        @if (session('orders')->onFirstPage())
								            <li class="page-item disabled">
								                <a class="page-link" href="#" tabindex="-1">Previous</a>
								            </li>
								        @else
								            <li class="page-item"><a class="page-link" href="{{ session('orders')->previousPageUrl() }}">Previous</a></li>
								        @endif
								      
								        @foreach (session('orders') as $element)
								            @if (is_string($element))
								                <li class="page-item disabled">{{ $element }}</li>
								            @endif

								            @if (is_array($element))
								                @foreach ($element as $page => $url)
								                    @if ($page == session('orders')->currentPage())
								                        <li class="page-item active">
								                            <a class="page-link">{{ $page }}</a>
								                        </li>
								                    @else
								                        <li class="page-item">
								                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
								                        </li>
								                    @endif
								                @endforeach
								            @endif
								        @endforeach
								        
								        @if (session('orders')->hasMorePages())
								            <li class="page-item">
								                <a class="page-link" href="{{ session('orders')->nextPageUrl() }}" rel="next">Next</a>
								            </li>
								        @else
								            <li class="page-item disabled">
								                <a class="page-link" href="#">Next</a>
								            </li>
								        @endif
								    </ul>
								@endif
		         			</div>
		         		</div>
		         </div>
		      </div>
		   </div>
		</div>
  </div>
</div>

<style type="text/css">
body{
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
<script type="text/javascript">
// Popup Open
function popupOpen(id) {
	document.getElementById("mainpopup"+id).style.display = "block";
	document.getElementById("maintable"+id).style.display = "block";
	document.getElementById("popup"+id).style.display = "block";
	document.getElementById("table"+id).style.display = "block";
	document.getElementById("open"+id).style.display = "none";
	document.getElementById("close"+id).style.display = "block";
}
	
// Popup Close
function popupClose(id) {
	document.getElementById("mainpopup"+id).style.display = "none";
	document.getElementById("maintable"+id).style.display = "none";
	document.getElementById("popup"+id).style.display = "none";
	document.getElementById("table"+id).style.display = "none";
	document.getElementById("open"+id).style.display = "block";
	document.getElementById("close"+id).style.display = "none";
}
</script>
@endsection