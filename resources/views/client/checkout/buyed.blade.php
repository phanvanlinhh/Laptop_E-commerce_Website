@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-body">
				<div class="jumbotron text-center">
				  <h1 class="display-3">CẢM ƠN QUÝ KHÁCH!</h1>
				  <p class="lead"><strong>Hãy kiểm tra email của quý khách!</strong> Để kiểm tra đơn hàng đã được gửi đến chúng tôi xử lí hay chưa.</p>
				  <hr>
				  <p>Chân thành gửi lời cảm ơn đến quý khách đã ủng hộ cửa hàng Laptop LT của chúng tôi. Đừng quên theo dõi các cập nhật trên trang web cũng như các liến kết mạng xác hội khác từ Laptop LT để nhận nhiều ưu đãi nhé!</p>
				  <p>
				    Quý khách gặp vấn đề? <a href="{{URL::to('/lien-he')}}">Hãy liên hệ với chúng tôi</a>
				  </p>
				  <p class="lead">
				    <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Tiếp tục mua sắm</a>
				    <a class="btn btn-grape btn-sm" href="{{route('client.history')}}" role="button">Xem lịch sử mua hàng</a>
				  </p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection