<style>
    li.active {
        border: 2px solid #92278f;
    }
</style>
@extends('layout')
@section('content')
<div class="row">
    <div class="wrap-categories">
        <div class="text-center mb-3">
            <a href="#" class="title-content">
                <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Chi tiết sản phẩm <img src="{{URL('public/client/img/dot-title-right.png')}}" alt="">
            </a>
        </div>
        <div class="container mb-4">
            <form action="{{URL('/save-cart')}}" method="post">
                {{csrf_field()}}
                @foreach($product_details as $key =>$value)
                <div class="wrap-product row">
                    <div class="col-sm-12 col-md-5 p-4">
                        <div class="row slick-product-details mb-3">
                            <div class="col-xs-12">
                                <img src="{{URL('/public/uploads/product/'.$value->product_image)}}" width="100%" height="100%" alt="{{$value->product_name}}">
                            </div>
                            <div class="col-xs-12">
                                <img src="https://laptopaz.vn/media/product/1694_" width="100%" height="100%" alt="">
                            </div>
                            <div class="col-xs-12">
                                <img src="https://laptopaz.vn/media/product/1692_6130_asus_rog_strix_g15__4.jpg" width="100%" height="100%" alt="">
                            </div>
                            <div class="col-xs-12">
                                <img src="https://laptopaz.vn/media/product/1692_5344_asus_g512_ial013t_4.jpg" width="100%" height="100%" alt="">
                            </div>
                        </div>
                        <div class="row slick-subProduct-details">
                            <div class="col-xs-12 px-1 subProduct-details">
                                <img src="{{URL('/public/uploads/product/'.$value->product_image)}}" width="100%" alt="{{$value->product_name}}">
                            </div>
                            <div class="col-xs-12 px-1 subProduct-details">
                                <img src="https://laptopaz.vn/media/product/1694_" width="100%" alt="">
                            </div>
                            <div class="col-xs-12 px-1 subProduct-details">
                                <img src="https://laptopaz.vn/media/product/1692_6130_asus_rog_strix_g15__4.jpg" width="100%" alt="">
                            </div>
                            <div class="col-xs-12 px-1 subProduct-details">
                                <img src="https://laptopaz.vn/media/product/1692_5344_asus_g512_ial013t_4.jpg" width="100%" alt="">
                            </div>
                        </div>
                    </div>

        <ul class="col-sm-12 col-md-7 product-info">
                        <li class="product-title">{{$value->product_name}}</li>
                        <li>
                            <p class="product-view">Lượt xem: <span>5218</span></p>
                            <p class="product-view">Ngày tạo: <span>{{$value->created_at}}</span></p>
                        </li>
                        <li class="product-price">
                            <b>Giá: <span>{{number_format($value->product_price,0,',','.')}} VNĐ</span></b>
                        </li>
                        <li><b>Danh mục:</b> <span>{{$value->category_name}}</span></li>
                        <li><b>Thông số:</b> <span>{{$value->product_parameters}}</span></li>
                        <li>
                            <b>Tình trạng: </b>
                            <span>
                                <?php if($value->product_status == 1) {
                                    echo 'Còn hàng';
                                } else {
                                    echo 'Hết hàng';
                                }
                                ?>
                            </span>
                        </li>
                        <li>
                            <b>Đánh giá: &ensp; </b> 
                            <a class="list-inline rating" title="Average Rating">
                                @for ($count=1; $count<=5; $count++) 
                                <?php
                                    if($count<=$rating) {
                                        $color = 'color:#ffcc00;';
                                    }
                                    else {
                                        $color = 'color:#ccc;';
                                    }
                                ?>
                                <a title="star_rating" id="{{$value->product_id}}-{{$count}}" data-index="{{$count}}"
                                data-product_id="{{$value->product_id}}" data-rating="{{$rating}}" class="rating"
                                style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</a>
                                @endfor
                                </a>
                        </li>
                        <li>
                            <div class="product-qty">
                                <div class="show"><label>Đặt hàng:</label></div>
                                <div class="row px-5">
                                    <!-- <div class="col-sm-12 col-md-3 mb-2 px-3">
                                        <input class="form-control text-center" type="number" name="qty" value="1" min="1" max="20">
                                    </div> -->
                                    <div class="col-sm-12 col-md-9 px-3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                            @csrf
                                                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                                <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                                <!-- <input type="hidden" name="product_id_hidden" value="{{$value->product_id}}"> -->
                                                <!-- <button type="submit" class="form-control btn btn-grape">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                                </button> -->
                                                <div class="col-sm-12 col-md-9">
                                                <a href="#"><button type="button" class="buy-product form-control btn btn-grape add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                                                    <i aria-hidden="true"></i> Mua ngay
                                                </button></a>
                                            </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                            <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Flocalhost%3A81%2Fdo_an_co_so_2%2Fdanh-muc-san-pham%2F24&width=174&layout=button_count&action=like&size=large&share=true&height=46&appId" width="174" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configur" data-width="" data-numposts="20"></div>
                    </ul>
                                <hr>
                    <h4><strong> Chi tiết về máy</strong></h4>
                            <p><span style="font-size: 16px;">
                                <strong>
                                    <span class="text-apple">{{$value->product_name}}</span>
                                </strong> 
                                    <br> 
                                <li>{{$value->product_desc}}</li>
                                </span>
                            </p>
                            <div class="col-xs-12">
                                <center><img src="{{URL('/public/uploads/product/'.$value->product_image)}}" width="30%" height="30%" alt="{{$value->product_name}}"></center>
                            </div>
                            <p><span style="font-size: 16px;">
                                <strong>
                                    <span class="text-apple"></span>
                                </strong> 
                                <li>{{$value->product_content}}</li>
                                </span>
                            </p>
                            <p><span style="font-size: 16px;">
                                <strong>
                                    <span class="text-apple"></span>
                                </strong> 
                                <li>{{$value->product_details}}</li>
                                </span>
                            </p>
                </div>      
                @endforeach
            </form>
            <div class="product-contact">
                <div class="text-center mb-3">
                    <div style="color: #fff;" class="title-content">
                        <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Thông tin liên hệ <img src="{{URL('public/client/img/dot-title-right.png')}}" alt="">
                    </div>
                </div>
                <div class="pro-contact-content">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p style="font-size: 20px;" class="title-content">Laptop LT</p>
                            <p>Địa chỉ: <span><a href="https://goo.gl/maps/g7GaF8ViwoCjwUdW6">470 Trần Đại Nghĩa, Q. Ngũ Hành Sơn, Tp. Đà Nẵng</a></span></p>
                            <p>Hotline: <span><a href="tel: 037 855 6163">037 855 6163 -</a><a href="tel: 0916 190 744"> 0916 190 744</a></span></p>
                            <p>Email: <span><a href="mailto: pvlinh.20it9@vku.udn.vn">pvlinh.20it9@vku.udn.vn</a></span></p>
                            <p>Fanpage: <span><a href="https://www.facebook.com/laptoplt/">Công ty Laptop LT</a></span></p>
                            <p>Website: <span><a href="#">Laptop LT</a></span></p>
                        </div>
                        <div class="col-sm-12 col-md-6 text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.8845962337627!2d108.25107529333566!3d15.97470262095603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e1!3m2!1svi!2s!4v1634551700603!5m2!1svi!2s"
                                width="90%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            <div class="title-content">
                <img src="{{URL('public/client/img/dot-title-left.png')}}" alt=""> Sản phẩm liên quan <img src="{{URL('public/client/img/dot-title-right.png')}}" alt="">
            </div>
        </div>
        <div class="wrap-products slick-product">
            @foreach($relate as $key => $pro_relate)
            <div class="col-xs-12 col-sm-6 col-md-3 list-product">
                <div class="box-product">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$pro_relate->product_id}}" class="cart_product_id_{{$pro_relate->product_id}}">
                        <input type="hidden" value="{{$pro_relate->product_name}}" class="cart_product_name_{{$pro_relate->product_id}}">
                        <input type="hidden" value="{{$pro_relate->product_image}}" class="cart_product_image_{{$pro_relate->product_id}}">
                        <input type="hidden" value="{{$pro_relate->product_price}}" class="cart_product_price_{{$pro_relate->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$pro_relate->product_id}}">
                        <a href="{{URL('chi-tiet-san-pham/'.$pro_relate->product_id)}}">
                            <img src="{{URL('/public/uploads/product/'.$pro_relate->product_image)}}" width="100%" alt="{{$pro_relate->product_name}}">
                        </a>
                        <div class="info-product text-center">
                            <h3><a href="{{URL('chi-tiet-san-pham/'.$pro_relate->product_id)}}">{{$pro_relate->product_name}}</a></h3>
                            <div class="price-product text-center">
                                <p>{{number_format($pro_relate->product_price,0,',','.')}} VNĐ</p>
                            </div>
                            <button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$pro_relate->product_id}}" name="add-to-cart">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection