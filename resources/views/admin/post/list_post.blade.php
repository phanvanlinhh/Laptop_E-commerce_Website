@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bài viết</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h6>
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

                // print_r($list_post);
                ?>
            </p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 80px;" class="text-center">Thumbnail bài viết</th>
                        <th>Tiêu đề bài viết</th>
                        <th>Danh mục</th>
                        <th>Lượt xem</th>
                        <th class="text-center">Tình trạng</th>
                        <th class="text-center">Thao tác</th>
                        <th>Đăng lúc</th>
                        <th>Sửa lần cuối</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_post as $key => $post)
                    <tr>
                        <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/post/'.$post->post_thumbnail)}}" width="80" height="80" alt="{{ $post->post_title}}"></td>
                        <td>{{ $post->post_title}}</td>
                        <td>{{ $post->category_name}}</td>
                        <td>{{ $post->post_view}}</td>
                        <td class="text-center">
                            <?php if($post->post_status == 0) { ?>
                                <a href="{{URL('/unactive-post/'.$post->post_id)}}">
                                    <i class="fa-2x fas fa-times text-danger" title="Công khai"></i>
                                </a>
                            <?php } else { ?>
                                <a href="{{URL('/active-post/'.$post->post_id)}}">
                                    <i class="fa-2x fas fa-check text-success" title="Bị ẩn"></i>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-post/'.$post->post_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-post/'.$post->post_id)}}" onclick="return confirm('Bạn có chắc chắn xóa bài viết này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        <td>{{ $post->post_created_at}}</td>
                        <td>{{ $post->post_updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection