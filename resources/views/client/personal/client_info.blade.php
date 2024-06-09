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
              <li class="breadcrumb-item active" aria-current="page">Thông tin</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
    
		<div class="row gutters-sm">
		   	<div class="col-md-4 mb-3">
		      <div class="card">
		        <div class="card-body">
		          <div class="d-flex flex-column align-items-center text-center">
		            <img src="https://rpgplanner.com/wp-content/uploads/2020/06/no-photo-available.png" alt="Admin" class="rounded-circle" width="150">
		            <!-- https://bootdey.com/img/Content/avatar/avatar7.png -->
		            <div class="mt-3">
		              <h4>{{$name}}</h4>
		              <p class="text-secondary mb-1">Khách Hàng</p>
		              <p class="text-muted font-size-sm">{{$city_name}} ({{$zip_code}})</p>
		              <a class="btn btn-grape col-md-12" href="{{route('client.update')}}">Sửa thông tin</a>
		            </div>
		          </div>
		        </div>
		      </div>

		      <!-- CREDIT CARD -->
		      @if($credit_card_name)
		      <div class="card mt-3">
		      	<div class="card-header"><b> Thẻ tín dụng</b></div>
		      	<div class="card-body table-responsive">
		      		<table class="table table-bordered">
					  <tbody>
					    <tr>
					      <th scope="row">Tên chủ thẻ</th>
					      <td colspan="2">{{$credit_card_name}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Số thẻ</th>
					      <td colspan="2">{{$credit_card_num}}</td>
					    </tr>
					    <tr>
					      <th scope="row">CVV/CVC</th>
					      <td colspan="2">{{$cvv_cvc}}</td>
					    </tr>
					    <tr>
					      <th scope="row">Hết hạn</th>
					      <td>{{$exp_month}}</td>
					      <td>{{$exp_year}}</td>
					    </tr>
					  </tbody>
					</table>
		      	</div>
		      </div>
		      @endif

		      <div class="card mt-3">
		        <ul class="list-group list-group-flush">
		          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
		            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
		            <span class="text-secondary">https://bootdey.com</span>
		          </li>
		          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
		            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
		            <span class="text-secondary">bootdey</span>
		          </li>
		          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
		            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
		            <span class="text-secondary">@bootdey</span>
		          </li>
		          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
		            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
		            <span class="text-secondary">bootdey</span>
		          </li>
		          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
		            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
		            <span class="text-secondary">bootdey</span>
		          </li>
		        </ul>
		      </div>
		    </div>
		    <div class="col-md-8">

		    	<!-- Personal Info -->
		      <div class="card mb-3">
		      	<div class="card-header"><b> Thông tin cá nhân</b></div>
		        <div class="card-body">
		          <div class="row">
		            <div class="col-sm-3">
		              <h6 class="mb-0">Họ và Tên</h6>
		            </div>
		            <div class="col-sm-9 text-secondary">
		              {{$name}}
		            </div>
		          </div>
		          <hr>
		          <div class="row">
		            <div class="col-sm-3">
		              <h6 class="mb-0">Email</h6>
		            </div>
		            <div class="col-sm-9 text-secondary">
		              {{$email}}
		            </div>
		          </div>
		          <hr>
		          <div class="row">
		            <div class="col-sm-3">
		              <h6 class="mb-0">Số điện thoại</h6>
		            </div>
		            <div class="col-sm-9 text-secondary">
		            	@if($phone)
		              		{{$phone}}
		              	@else
		              		(Quý khách Chưa cập nhật)
		              	@endif
		            </div>
		          </div>
		          <hr>
		          <div class="row">
		            <div class="col-sm-3">
		              <h6 class="mb-0">Địa chỉ đường</h6>
		            </div>
		            <div class="col-sm-9 text-secondary">
		              	@if($street_address)
		              		{{$street_address}}
		              	@else
		              		(Quý khách Chưa cập nhật)
		              	@endif
		            </div>
		          </div>
		          <hr>
		          <div class="row">
		            <div class="col-sm-3">
		              <h6 class="mb-0">Địa Phương</h6>
		            </div>
		            <div class="col-sm-9 text-secondary">
		            	@if($city)
		              		{{$ward_name}}, {{$district_name}}, {{$city_name}}
		              	@else
		              		(Quý khách Chưa cập nhật)
		              	@endif
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="card mb-3">
		      	<div class="card-header">
		      		<b> Lịch sử mua hàng</b>
		      		<a style="float: right;" class="btn btn-success" href="{{route('client.history')}}">Xem nhiều hơn</a>
		      	</div>
		        <div class="card-body">
		          <div class="row table-responsive">
	          		<table class="table table-striped ">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Mã đơn</th>
					      <th scope="col">Đặt hàng lúc</th>
					      <th scope="col">Tổng thanh toán</th>
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
							      	@switch($order->order_status)
									    @case(0)
									        Chờ shop xử lí
									        @break
									    @case(1)
									        Shop đã xử lí nhưng chưa giao
									        @break
									    @case(2)
									        Đang giao...
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
								      		<button class="btn btn-primary" id="open{{$order->id}}" name="Open" onclick="popupOpen('{{$order->id}}');"><i class="fa fa-caret-down"></i></button>
								      		<button name="Close" id="close{{$order->id}}" class="btn btn-primary" onclick="popupClose('{{$order->id}}');" style="display: none;"><i class="fa fa-caret-up"></i></button>
									    	@break
									    @endif
							    		@endforeach
						    		@else
						    			lỗi k có
						    		@endif
						    		</td>
							    </tr>
									<tr><td colspan="6">
									<!-- Popup -->
									@php
										$d_count = 0;
									@endphp
									<div class="table-responsive col-md-12" id="popup{{$order->id}}">

									<table id="table{{$order->id}}" class="table table-bordered col-md-12" style="display:none;">
									  <thead>
									  	<tr><th colspan="4">
									  		Chi tiết đơn hàng (mã: {{$order->id}}
										  		@if($order->order_coupon)
	                        	| giảm: {{number_format($order->order_coupon)}} VNĐ 
	                        @endif
                      	)</th></tr>
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
									</td></tr>
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

		      <div class="row gutters-sm">
		        <div class="col-sm-6 mb-3">
		          <div class="card h-100">
		            <div class="card-body">
		              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
		              <small>Web Design</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Website Markup</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>One Page</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Mobile Template</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Backend API</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-sm-6 mb-3">
		          <div class="card h-100">
		            <div class="card-body">
		              <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
		              <small>Web Design</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Website Markup</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>One Page</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Mobile Template</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
		              <small>Backend API</small>
		              <div class="progress mb-3" style="height: 5px">
		                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
		              </div>
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
	document.getElementById("popup"+id).style.display = "block";
	document.getElementById("table"+id).style.display = "block";
	document.getElementById("open"+id).style.display = "none";
	document.getElementById("close"+id).style.display = "block";
}
	
// Popup Close
function popupClose(id) {
	document.getElementById("popup"+id).style.display = "none";
	document.getElementById("table"+id).style.display = "none";
	document.getElementById("open"+id).style.display = "block";
	document.getElementById("close"+id).style.display = "none";
}
</script>
@endsection