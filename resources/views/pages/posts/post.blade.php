@extends('layout')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container p-1 pb50">
    <div class="row">
        <div class="col-md-9 mb10 pr-3">
            
        <!-- post article -->
            <article class="bg-white mb-3 rounded p-2">
                <img src="{{asset('public/uploads/post/'.$this_post->post_thumbnail)}}" alt="" class="img-fluid mb30">
                <div class="post-content text-dark">
                    <h2><b>{{$this_post->post_title}}</b></h2>
                    <ul class="post-meta list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-calendar-o"></i>
                                <?php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                    $dt = Carbon::parse($this_post->created_at);
                                    $now = Carbon::now();
                                    echo $dt->diffForHumans($now);
                                ?>
                                {{date(', D, d M Y', strtotime($this_post->created_at))}}
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-folder"></i>
                                @foreach($category_post as $key => $cate)
                                    @if($cate->category_id == $this_post->cate_post_id)
                                        <a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">
                                        {{$cate->category_name}}</a>
                                    @endif
                                @endforeach
                        </li>
                        <li class="list-inline-item">
                            <i class="fa fa-eye"></i>
                            {{$this_post->post_view}} lượt xem
                        </li>
                    </ul>
                        {{print_r($this_post->post_content)}}

                <!-- share button -->
                   <!--  <ul class="list-inline share-buttons">
                        <li class="list-inline-item">Chia sẻ:</li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="social-icon-sm si-dark si-colored-linkedin si-gray-round">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul> -->
                <!-- end share button -->

                <!-- comment -->
                    <!-- <hr class="mb40">
                    <h4 class="mb40 text-uppercase font500">About Author</h4>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font700">Jane Doe</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <hr class="mb40">
                    <h4 class="mb40 text-uppercase font500">Comments</h4>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                        <a href="#" class="float-right">Reply</a>
                                        Jane Doe</h5> Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                        <a href="#" class="float-right">Reply</a>
                                        Jane Doe</h5> Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                        <a href="#" class="float-right">Reply</a>
                                        Jane Doe</h5> Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <hr class="mb40">
                    <h4 class="mb40 text-uppercase font500">Post a comment</h4>
                    <form role="form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="john@doe.com">
                        </div>
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" rows="5" placeholder="Comment"></textarea>
                        </div>
                        <div class="clearfix float-right">
                            <button type="button" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form> -->
                <!-- end comment -->

                </div>
            </article>
        <!-- post article-->

            <div class="row">
                <div class="col-md-12 mb-3 bg-warning text-dark rounded">
                    <strong><h2 class="text-center">
                        Các bài viết liên quan</h2></strong>
                </div>
            </div>

        <!-- Test post -->
            <div class="wrap-categories">
                <div class="row">
                    <!-- card -->
                        <div class="col-xs-12 col-sm-6 col-md-4 p-2">
                        <div class="box-product">
                            <div class="card single_post">
                            <div class="header">
                                <h2>Bài viết <strong>liên quan</strong></h2>
                            </div>
                            <div class="body">
                                <h3 class="m-t-0 m-b-5"><a href="blog-details.html">Apple Introduces Search Ads Basic</a></h3>
                                <ul class="meta-post">
                                    <li><a href="javascript:void(0);"><i class="fa fa-account col-blue"></i>Posted By: John Smith</a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-label col-amber"></i>Technology</a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-text col-blue"></i>Comments: 3</a></li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="img-post m-b-15">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Awesome Image">
                                    <div class="social_share">
                                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="fa fa-facebook"></i></button>
                                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="fa fa-twitter"></i></button>
                                        <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="fa fa-instagram"></i></button>
                                    </div>
                                </div>
                                <p>okokok</p>
                                <a href="blog-details.html" title="Xem thêm" class="btn btn-round btn-primary">Xem thêm</a>
                            </div>
                        </div>
                        </div>
                        </div>
                    <!-- end card -->

                </div>
            </div>
        <!-- end test post -->

        </div>
        <div class="col-md-3 mb10">
            <div class="mb10 bg-white rounded p-2">
                <form class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-describedby="basic-addon2">
                        <button class="input-group-addon rounded" id="basic-addon2"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <h4 class="sidebar-title text-center bg-warning text-dark p-1">
                    Danh mục bài viết</h4>
                <ul class="list-unstyled categories">
                    @foreach($category_post as $key => $cate)
                        @if($cate->category_id == $this_post->cate_post_id)
                        <li class="active"><a href="#">{{$cate->category_name}}</a></li>
                        @else
                        <li><a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                        @endif
                    @endforeach
                    <!-- <li class="active"><a href="#">Apartment</a>
                        <ul class="list-unstyled">
                            <li><a href="#">Office</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!--/col-->
            <div class="bg-white rounded p-2">
                <h4 class="sidebar-title text-center bg-warning text-dark p-1">
                    Tin Mới Nhất</h4>
                <ul class="list-unstyled">
                    @foreach($all_post as $key => $post)
                        <li class="media mb-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <img class="d-flex mr-3 img-fluid" width="64" src="{{asset('public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$post->post_title}}">
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><a href="#">{{$post->post_title}}</a></h5> {{date('d-m-Y', strtotime($post->created_at))}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
/*
Blog post entries
*/

.entry-card {
    -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
}

.entry-content {
    background-color: #fff;
    padding: 36px 36px 36px 36px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.entry-content .entry-title a {
    color: #333;
}

.entry-content .entry-title a:hover {
    color: #4782d3;
}

.entry-content .entry-meta span {
    font-size: 12px;
}

.entry-title {
    font-size: .95rem;
    font-weight: 500;
    margin-bottom: 15px;
}

.entry-thumb {
    display: block;
    position: relative;
    overflow: hidden;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.entry-thumb img {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.entry-thumb .thumb-hover {
    position: absolute;
    width: 100px;
    height: 100px;
    background: rgba(71, 130, 211, 0.85);
    display: block;
    top: 50%;
    left: 50%;
    color: #fff;
    font-size: 40px;
    line-height: 100px;
    border-radius: 50%;
    margin-top: -50px;
    margin-left: -50px;
    text-align: center;
    transform: scale(0);
    -webkit-transform: scale(0);
    opacity: 0;
    transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
}

.entry-thumb:hover .thumb-hover {
    opacity: 1;
    transform: scale(1);
    -webkit-transform: scale(1);
}

.article-post {
    border-bottom: 1px solid #eee;
    padding-bottom: 70px;
}

.article-post .post-thumb {
    display: block;
    position: relative;
    overflow: hidden;
}

.article-post .post-thumb .post-overlay {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    transition: all .3s;
    -webkit-transition: all .3s;
    opacity: 0;
}

.article-post .post-thumb .post-overlay span {
    width: 100%;
    display: block;
    vertical-align: middle;
    text-align: center;
    transform: translateY(70%);
    -webkit-transform: translateY(70%);
    transition: all .3s;
    -webkit-transition: all .3s;
    height: 100%;
    color: #fff;
}

.article-post .post-thumb:hover .post-overlay {
    opacity: 1;
}

.article-post .post-thumb:hover .post-overlay span {
    transform: translateY(50%);
    -webkit-transform: translateY(50%);
}

.post-content .post-title {
    font-weight: 500;
}

.meta {
    padding-top: 15px;
    margin-bottom: 20px;
}

.meta li:not(:last-child) {
    margin-right: 10px;
}

.meta li a {
    color: #999;
    font-size: 13px;
}

.meta li a:hover {
    color: #4782d3;
}

.meta li i {
    margin-right: 5px;
}

.meta li:after {
    margin-top: -5px;
    content: "/";
    margin-left: 10px;
}

.meta li:last-child:after {
    display: none;
}

.post-masonry .masonry-title {
    font-weight: 500;
}

.share-buttons li {
    vertical-align: middle;
}

.share-buttons li a {
    margin-right: 0px;
}

.post-content .fa {
    color: #ddd;
}

.post-content a h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 0px;
}

.article-post .owl-carousel {
    margin-bottom: 20px !important;
}

.post-masonry h4 {
    text-transform: capitalize;
    font-size: 1rem;
    font-weight: 700;
}
.mb10 {
    margin-bottom: 10px !important;
}
.mb30 {
    margin-bottom: 30px !important;
}
.media-body h5 a {
    color: #555;
}
.categories li a:before {
    content: "\f0da";
    font-family: 'FontAwesome';
    margin-right: 5px;
}
/*
Template sidebar
*/

.sidebar-title {
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.categories li {
    vertical-align: middle;
}

.categories li > ul {
    padding-left: 15px;
}

.categories li > ul > li > a {
    font-weight: 300;
}

.categories li a {
    color: #999;
    position: relative;
    display: block;
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
}

.categories li a:before {
    content: "\f0da";
    font-family: 'FontAwesome';
    margin-right: 5px;
}

.categories li a:hover {
    color: #444;
    background-color: #f5f5f5;
}

.categories > li.active > a {
    font-weight: 600;
    color: #444;
}

.media-body h5 {
    font-size: 15px;
    letter-spacing: 0px;
    line-height: 20px;
    font-weight: 400;
}

.media-body h5 a {
    color: #555;
}

.media-body h5 a:hover {
    color: #4782d3;
}
</style>


<style type="text/css">
body{
    background:#eee;
}
.content {
    padding: 35px 0px;
}

.post-list {
    padding: 90px 0px;
}

.post-detail {
    padding: 40px 0px;
    margin-top: 120px;
}

.post {
    width: 100%;
    float: left;
    -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
    background: #fff;
    margin-bottom: 40px;
    border-radius: 3px;
}

.feature-post .thumbnail .author-info {
    padding: 20px 5px 20px 40px;
    text-align: left;
    min-height: 80px;
    background: #2c3840;
    float: left;
    width: 100%;
}

.post .post-type {
    float: left;
    width: 100%;
}

.post iframe {
    padding: 0px;
    margin: 0px;
}

.post .mejs-container {
    border-radius: 3px 3px 0px 0px;
    width: 100% !important;
}

.post .post-video {
    border-radius: 3px 3px 0px 0px;
}

.post .post-video iframe {
    width: 100%;
}

.post .post-video video {
    border-radius: 3px 3px 0px 0px;
}

.post .post-multiple-img a img {
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    width: 100%;
    height: auto;
    display: block;
    min-height: 160px;
}

.post .post-multiple-img a {
    float: left;
    width: 100%;
    display: block;
}

.post .post-multiple-img a:hover img {
    opacity: 0.7;
}

.post .post-audio {
    height: auto;
}

.post .post-audio ._SMB-widget {
    width: 100%;
}

.post .post-quote blockquote {
    text-align: center;
    margin: 0px;
    padding: 25px 15px;
}

.post .post-quote blockquote h3 {
    color: #e74c3c;
    font-size: 36px;
    margin: 0px 0px 10px 0px;
}

.post .post-quote blockquote p {
    color: #333;
    font-size: 24px;
    font-weight: 300;
}

.post .post-img a {
    display: block;
}

.post .post-img:hover a img {
    opacity: 0.7;
}

.post .post-img a img {
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    width: 100%;
    height: auto;
    border-radius: 3px 3px 0px 0px;
}

.post-detail .post .caption {
    padding: 55px 45px 0px 45px;
}

.post .caption {
    float: left;
    width: 100%;
    text-align: left;
    padding: 25px 25px;
}

.post .caption h3 {
    margin: 0px 0px 20px 0px;
    color: #36a0e7;
    font-weight: 300;
    font-size: 34px;
    line-height: 42px;
}

.post .caption p {
    line-height: 28px;
    margin-bottom: 20px;
    font-size: 16px;
}

.post .author-info {
    padding: 15px 15px 15px 15px;
    text-align: left;
    min-height: 60px;
    border-bottom: 1px solid #ddd;
    background: #fcfcfc;
    float: left;
    width: 100%;
}

.post .author-info .list-inline {
    margin: 0px;
}

.post .author-info ul li:first-child {
    border-left: none;
    padding-left: 0px;
}

.post .author-info ul li {
    float: left;
    border-left: 1px solid #ddd;
    padding-left: 20px;
    padding-right: 20px;
}

.post .author-info ul li p {
    line-height: 16px;
    color: #3b4952;
    font-weight: 300;
    font-size: 14px;
    margin: 0px;
}

.post .author-info ul li strong {
    color: #3b4952;
}

.post .author-info ul li a {
    color: #3b4952;
    font-weight: 700;
    font-size: 16px;
    line-height: 20px;
}

.post .author-info ul li a:hover {
    color: #e74c3c;
    text-decoration: none;
}

.post .author-info ul li .icon-box {
    margin-right: 15px;
    width: 36px;
    text-align: center;
    line-height: 36px;
    font-size: 30px;
    height: 36px;
    float: left;
    background: transparent;
    color: #aebbc5;
}

.post .author-info ul li .icon-box img {
    border-radius: 3px;
    width: 100%;
}

.post .author-info ul li .info {
    float: left;
}

.post .author-info.author-info-2 ul li:first-child {
    border-left: none;
    padding-left: 0px;
}

.post .author-info.author-info-2 ul li .icon-box {
    font-size: 28px;
}

.post .post-category {
    float: left;
    width: 100%;
    text-align: left;
    margin-bottom: 20px;
}

.post .post-category a {
    margin: 0px;
    font-size: 18px;
    font-weight: 300;
    color: #3b4952;
}

.post .post-category span {
    width: 12px;
    height: 12px;
    display: inline-block;
    background: #3b4952;
    vertical-align: middle;
    margin-right: 10px;
}

.post .post-category a:hover span {
    background: #e74c3c;
    color: #e74c3c;
}

.post .post-category a:hover {
    color: #e74c3c;
}

.post .tags {
    float: left;
    width: 100%;
    margin-bottom: 20px;
}

.post .tags li {
    margin-bottom: 8px;
    padding: 0px 2px;
}

.post .tags li a {
    background: #ebf1f4;
    font-size: 14px;
    font-weight: 300;
    border-radius: 3px;
    padding: 4px 8px;
    color: #3b4952;
}

.post .tags li a:hover {
    background: #3b4952;
    color: #fff;
}

.img-grid {
    float: left;
    margin-bottom: 40px;
}

.img-grid li {
    margin: 0px;
    float: left;
}

.post .caption h5 {
    text-decoration: underline;
    margin: 0px 0px 20px 0px;
    color: #3b4952;
    font-weight: 300;
    font-size: 24px;
    line-height: 30px;
}

.post .list-unstyled {
    margin-bottom: 40px;
}

.post .list-unstyled li {
    font-size: 16px;
    line-height: 28px;
    font-weight: 500;
    color: #49545b;
}

.post .list-unstyled li i {
    color: #a0b9ca;
    margin-right: 15px;
}

blockquote {
    background: #f2f6f8;
    border: 1px solid #e5e5e5;
    line-height: 28px;
    margin-bottom: 40px;
    font-size: 16px;
    font-weight: 500;
    color: #49545b;
}

.line-block {
    padding: 20px 45px;
    border-top: 1px solid #eef3f6;
    border-bottom: 1px solid #eef3f6;
    float: left;
    width: 100%;
}

.post .line-block .tags {
    margin-bottom: 0px;
}

.share-this {
    padding: 20px 45px;
    border-bottom: 1px solid #eef3f6;
    float: left;
    width: 100%;
}

.share-this p,
.share-this ul {
    margin-bottom: 0px;
}

.share-this li a {
    background: #2c3840;
    line-height: 34px;
    text-align: center;
    color: #fff;
    width: 32px;
    height: 32px;
    display: block;
    border-radius: 50%;
}

.share-this li a.pinterest {
    background: #d91c1c;
}

.share-this li a.google-plus {
    background: #f25353;
}

.share-this li a.facebook {
    background: #2b77be;
}

.share-this li a.twitter {
    background: #62bfef;
}

.related-post {
    padding: 40px 45px;
    border-bottom: 1px solid #eef3f6;
    float: left;
    width: 100%;
}

.related-post .thumbnail {
    padding: 0px;
    border: none;
}

.related-post .thumbnail .caption {
    padding: 30px 0px 0px 0px;
}

.related-post .thumbnail .caption a {
    font-size: 18px;
    line-height: 28px;
    font-weight: 300;
    color: #49545b;
}

.related-post .thumbnail .caption a:hover {
    color: #36a0e7;
}

.related-post .thumbnail:hover a img {
    opacity: 0.7;
}

.related-post h4 {
    color: #49545b;
    font-weight: 700;
    font-size: 18px;
    margin: 0px 0px 20px 0px;
}

.comment-count {
    padding: 45px 45px;
    border-bottom: 1px solid #eef3f6;
    float: left;
    width: 100%;
}

.comment-count h4 {
    font-weight: 500;
    font-size: 24px;
    color: #3b4952;
}

.comment-count p {
    margin-bottom: 0px;
}

.comment-list {
    float: left;
    width: 100%;
}

.comment-list .media:first-child {
    margin-top: 0px;
    border-bottom: 1px solid #eef3f6;
}

.comment-list .media {
    padding: 30px 45px;
    margin-top: 0px;
}

.comment-list .media .media-body .media {
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 30px;
    padding-right: 30px;
    margin-left: -80px;
    border-left: 1px solid #eef3f6;
    border-bottom: 1px solid #eef3f6;
}

.comment-list .media .media-body {
    position: relative;
}

.comment-list .media .media-left {
    padding-right: 20px;
}

.comment-list .media .nested-first {
    margin-top: 30px;
    border-top: 1px solid #eef3f6;
}

.comment-list .media .nested-first:before {
    position: absolute;
    left: -80px;
    top: 90px;
    content: '';
    width: 1px;
    background: #eef3f6;
    height: 170px;
}

.comment-list .media,
.comment-list .media-body {
    overflow: visible;
    zoom: 1;
}

.comment-list .media .media-body ul {
    margin-bottom: 0px;
}

.comment-list .media .media-body ul li a {
    color: #919ea8;
    font-size: 18px;
    font-weight: 500;
}

.comment-list .media .media-body ul li a:hover {
    color: #36a0e7;
}

.comment-list .media .media-body ul li a.reply-btn {
    color: #49545b;
    text-decoration: underline;
}

.comment-list .media .media-body ul li a.reply-btn:hover {
    color: #36a0e7;
}

.comment-list .media .media-body ul li {
    font-size: 18px;
    padding-right: 15px;
    color: #919ea8;
    font-weight: 500;
}

.comment-form {
    float: left;
    width: 100%;
    padding: 30px 45px;
}

.comment-form h4 {
    font-weight: 300;
    font-size: 28px;
    color: #3b4952;
    margin-bottom: 40px;
}

.comment-form .form-control {
    border-radius: 0px;
    background: #f1f4f6;
    border: none;
    height: 50px;
    color: #4a555c;
    font-size: 16px;
}

.comment-form .form-control::-webkit-input-placeholder {
    color: #4a555c;
}

.comment-form .form-control:-moz-placeholder {
    color: #4a555c;
}

.comment-form .form-control::-moz-placeholder {
    color: #4a555c;
}

.comment-form .form-control:-ms-input-placeholder {
    color: #4a555c;
}

.comment-form textarea.form-control {
    height: auto;
    min-height: 200px;
    resize: none;
}

.comment-form form {
    margin-bottom: 40px;
}

.vt-post.post .author-info ul li {
    padding-left: 15px;
    padding-right: 15px;
    float: none;
}

.vt-post.post .author-info {
    border-radius: 0px 0px 0px 3px;
    border-bottom: none;
    border-right: 1px solid #ddd;
    padding: 15px 12px 15px 12px;
}

.vt-post.post .post-img a img {
    border-radius: 3px 0px 0px 0px;
}

.vt-post.post .caption {
    padding: 25px 0px;
}

.post .caption h3 {
    margin: 0px 0px 20px 0px;
    color: #36a0e7;
    font-weight: 300;
    font-size: 34px;
    line-height: 42px;
}
.md-heading {
    font-size: 24px !important;
    line-height: 36px !important;
    margin-bottom: 15px !important;
}

.pagination>.active>a,
.pagination>.active>a:focus,
.pagination>.active>a:hover,
.pagination>.active>span,
.pagination>.active>span:focus,
.pagination>.active>span:hover {
    background-color: #3b4952;
    border-color: #3b4952;
}

.pagination>li>a,
.pagination>li>span {
    color: #2c3840;
    margin: 0px 5px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
    -moz-box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
    box-shadow: 0px 1px 3px 0px rgba(44, 56, 64, 0.2);
    border: none;
    font-size: 16px;
}

.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover {
    background-color: #e74c3c;
    border-color: #e74c3c;
    color: #fff;
}

.pagination-wrap {
    width: 100%;
    float: left;
    margin-bottom: 35px;
}

.pagination {
    margin: 0px;
}
</style>
<style type="text/css">
.img-post {
    position: relative;
    overflow: hidden;
    max-height: 500px
}

.img-post>img {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    -webkit-transition: -webkit-transform .4s ease, opacity .4s ease;
    transition: transform .4s ease, opacity .4s ease;
    max-width: 100%;
    filter: none;
    -webkit-filter: grayscale(0);
    -webkit-transform: scale(1.01)
}

.img-post:hover img {
    -webkit-transform: scale(1.02);
    -ms-transform: scale(1.02);
    transform: scale(1.02);
    opacity: .7;
    filter: gray;
    -webkit-filter: grayscale(1);
    -webkit-transition: all .8s ease-in-out
}

.img-post:hover .social_share {
    display: block
}

.img-post .social_share {
    position: absolute;
    bottom: 10px;
    left: 10px;
    display: none
}

 .meta-post {
    list-style: none;
    padding: 0;
    margin: 0
}

 .meta-post li {
    display: inline-block;
    margin-right: 15px
}

.meta-post li a {
    font-style: italic;
    color: #959595;
    text-decoration: none;
    font-size: 12px
}

.meta-post li a i {
    margin-right: 6px;
    font-size: 12px
}

.single_post h3 {
    font-size: 20px;
    line-height: 26px;
    -webkit-transition: color .4s ease;
    transition: color .4s ease
}

 .single_post h3 a {
    color: #242424;
    text-decoration: none
}

 .single_post p {
    font-size: 15px
}

.single_post .blockquote p {
    margin-top: 0 !important
}

 .right-box .categories-clouds li {
    display: inline-block;
    margin-bottom: 5px
}

.right-box .categories-clouds li a {
    display: block;
    font-size: 14px;
    border: 1px solid #ccc;
    padding: 6px 10px;
    border-radius: 3px;
    color: #242424
}

.right-box .instagram-plugin {
    overflow: hidden
}

.right-box .instagram-plugin li {
    float: left;
    overflow: hidden;
    border: 1px solid #fff
}

.comment-reply li {
    margin-bottom: 15px
}

.comment-reply li:last-child {
    margin-bottom: none
}

 .comment-reply li h5 {
    font-size: 18px
}

.comment-reply li p {
    margin-bottom: 0px;
    font-size: 15px;
    color: #777
}

.comment-reply .list-inline li {
    display: inline-block;
    margin: 0;
    padding-right: 20px
}

.comment-reply .list-inline li a {
    font-size: 13px
}

.page.with-sidebar.right .left-box {
    margin-right: -20px
}

@media (max-width: 414px) {
    .section {
        padding: 20px 0
    }
    .left-box .single-comment-box>ul>li {
        padding: 25px 0
    }
    .left-box .single-comment-box ul li .icon-box {
        display: inline-block
    }
    .left-box .single-comment-box ul li .text-box {
        display: block;
        padding-left: 0;
        margin-top: 10px
    }
}
.card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
}

.card .body {
    font-size: 14px;
    color: #424242;
    padding: 20px;
    font-weight: 400;
}
.card .header {
    color: #424242;
    padding: 20px;
    position: relative;
    box-shadow: none;
}
.card .header h2 {
    font-size: 15px;
    color: #757575;
    position: relative;
}
.card .header h2:before {
    background: #a27ce6;
}
.card .header h2::before {
    position: absolute;
    width: 20px;
    height: 1px;
    left: 0;
    top: -20px;
    content: '';
}
.m-b-15 {
    margin-bottom: 15px;
}
</style>
@endsection