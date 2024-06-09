@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục sản phẩm</h6>
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
                ?>
            </p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Thời gian thêm</th>
                        <th>Chỉnh sửa lần cuối</th>
                        <th class="text-center">Kích hoạt</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_categories_product as $key => $cate_pro)
                    <tr>
                        <td>{{ $cate_pro->category_name}}</td>
                        <td>{{ $cate_pro->created_at}}</td>
                        <td>
                        <?php if($cate_pro->updated_at == '') { ?>
                                {{ $cate_pro->created_at}}
                            <?php } else { ?>
                                {{ $cate_pro->updated_at}}
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($cate_pro->category_status == 0) { ?>
                                <a href="{{URL('/unactive-category-product/'.$cate_pro->category_id)}}"><i class="fa-2x fas fa-times text-danger"></i></a>
                            <?php } else { ?>
                                <a href="{{URL('/active-category-product/'.$cate_pro->category_id)}}"><i class="fa-2x fas fa-check text-success"></i></a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-category-product/'.$cate_pro->category_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-category-product/'.$cate_pro->category_id)}}" onclick="return confirm('Bạn có chắn chắn xóa danh mục sản phẩm này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection