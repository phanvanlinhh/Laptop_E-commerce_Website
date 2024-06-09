@extends('layout')
@section('content')
<div class="wrap-slider slick-slider">
    @foreach($slider as $key => $slide)
    <div class="col-xs-12">
        <img src="{{url('public/uploads/slider/'.$slide->slider_image)}}" width="100%" alt="{{$slide->slide_name}}">
    </div>
    @endforeach
</div>
<div class="wrap-categories">
    @foreach($category as $key => $cate)
    <div class="row">
        <div class="text-center mb-3">
            <a class="title-content" href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">
                <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> {{$cate->category_name}} <img src="{{URL('public/client/img/dot-title-right.png')}}" alt="">
            </a>
            <h5 class="font-linotteBold">{{$cate->category_desc}}</h5>
        </div>
        <div class="wrap-products slick-product">
            @foreach($list_product as $key => $product)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <!-- <form> -->
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}">
                            <img src="{{URL('public/uploads/product/'.$product->product_image)}}" width="100%" alt="{{$product->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($product->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<div class="wrap-banner">
    <div class="wrap-img text-center">
        <img src="{{URL('public/client/img/banner1.png')}}" alt="Laptop LT" title="Laptop LT - Thế giới công nghệ">
    </div>
    <div class="container text-center">
        <div class="title-content">
            <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Laptop LT - Thế giới laptop <img src="{{URL('public/client/img/dot-title-right.png')}}" alt=""></div>
        <div class="descript-introduce">
            <ol>
                <li>&emsp;Bạn đang cần tìm một địa chỉ uy tín bán laptop chính hãng và giá rẻ?</li>
                <li>&emsp;Bạn phân vân không biết lựa chọn thế nào là đúng để tránh chọn nhầm laptop đối với công việc của bạn?</li>
                <li>&emsp;Bạn luôn lo lắng về vấn đề nguồn gốc xuất xứ của trái cây?</li>
                <li>&emsp;Bạn đã biết gì về các loại laptop chưa?</li>
                <li>&emsp;Ở Đà Nẵng bạn không biết nơi nào bán laptop chính hãng và uy tín với giá cả hợp lý và chất lượng hết?</li>
            </ol>
            <span class="text-uppercase"><i class="pr-3 fas fa-greater-than"></i>Hãy để <a href="{{URL('/')}}">Laptop LT</a> giải quyết tất cả các vấn đề này cho bạn.</span>
        </div>
        <div class="wrap-program">
            <div class="col-md-6"><img src="{{URL('public/client/img/banner-laptop.png')}}" width="100%" alt="Laptop LT" title="Laptop LT - Thế giới công nghệ"></div>
            <div class="col-md-3">
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{URL('public/client/img/quality.png')}}" alt="Uy tín chất lượng"></a>
                </div>
                <p class="program-title">Uy tín chất lượng</p>
                <div>
                    <p>Để chiếm được trái tim khách hàng cần có chữ tín. Thương hiệu mạnh nhờ chữ tín và cũng chính chữ tín làm nên thương hiệu.</p>
                </div>
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{URL('public/client/img/best-price.png')}}" alt="Giá cả hợp lý"></a>
                </div>
                <p class="program-title">Giá cả hợp lý</p>
                <div>
                    <p>Giá có thể không tốt nhất nhưng Laptop LT cam kết chất lượng luôn tương xứng với giá cả.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{URL('public/client/img/authentic.png')}}" alt="Sản phẩm chính hãng"></a>
                </div>
                <p class="program-title">Sản phẩm chính hãng</p>
                <div>
                    <p>Tất cả sản phẩm tại Laptop LT đều là sản phẩm chính hãng </p>
                </div>
                <div class="rotate-y mt-4 text-center">
                    <a href="#"><img src="{{URL('public/client/img/free-ship.png')}}" alt="Nhanh chóng chính xác"></a>
                </div>
                <p class="program-title">Nhanh chóng chính xác</p>
                <div>
                    <p>Laptop LT cam kết giao hàng tận tay cực nhanh trong vòng 2h kể từ lúc nhận order cho các đơn hàng nội thành.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrap-message px-2">
    <div class="container">
        <div class="row col-md-6 m-left">
            <div class="frame-message">
                <div class="text-center mb-2">
                    <div class="title-content mb-0">
                        <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Đăng ký nhận tin <img src="{{URL('public/client/img/dot-title-right.png')}}" alt=""></div>
                    <span class="subTitle-message mb-2">Hãy nhập thông tin vào form bên dưới để chúng tôi liên hệ với bạn!</span>
                </div>
                <!-- <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-2"><input type="text" class="form-control" placeholder="Họ và tên" /></div>
                        <div class="col-md-4 mb-2"><input type="text" class="form-control" placeholder="Số điện thoại" /></div>
                        <div class="col-md-4 mb-2"><input type="email" class="form-control" placeholder="Email" /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-2"><textarea class="form-control" cols="60" rows="2" placeholder="Nội dung"></textarea></div>
                        <div class="col-md-4 mb-2"><input type="submit" class="btn btn-danger form-control" value="Gửi"></div>
                    </div>
                </form> -->
                <form>
                  <!-- Name input -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="form4Example1">Họ và tên</label>
                    <input type="text" id="form4Example1" class="form-control" required />
                  </div>

                  <!-- Phone number input -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="form4Example1">Số điện thoại</label>
                    <input type="num" id="form4Example1" class="form-control" required />
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="form4Example2">Email address</label>
                    <input type="email" id="form4Example2" class="form-control" required />
                  </div>

                  <!-- Message input -->
                  <div class="form-outline mb-1">
                    <label class="form-label" for="form4Example3">Message</label>
                    <textarea class="form-control" id="form4Example3" rows="4" required ></textarea>
                  </div>

                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-center mb-1">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form4Example4"
                      checked
                    />
                    <label class="form-check-label" for="form4Example4">
                      Gửi một tin nhắn với nội dung đã gửi về email của bạn
                    </label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block col-md-12 mb-2">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="wrap-partner">
    <div class="wrap-partner">
    <div class="text-center my-3">
        <div class="title-content">
            <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Đối tác - Khách hàng <img src="{{URL('public/client/img/dot-title-right.png')}}" alt=""></div>
    </div>
    <div class="wrap-partner slick-partner">
        @foreach($partner as $key => $part)
            <div class="col-xs-12 col-sm-6 col-md-2 list-partner">
                <div class="box-partner">
                    <p>
                        <a href="@if($part->partner_link != '') {{$part->partner_link}} @else # @endif">
                            <img src="{{url('public/uploads/partner/'.$part->partner_image)}}" width="100%" alt="{{$part->partner_name}}">
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

</div>
@endsection