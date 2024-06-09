@extends('admin.layout')
@section('admin_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bài viết</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm bài viết</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/save-post')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cate_post_id">Danh mục bài viết</label>
                    <select id="cate_post_id" name="cate_post_id" class="form-control form-control-sm">
                    @foreach($cate_post as $key => $cate)
                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="post_status">Tình trạng</label>
                    <select id="post_status" name="post_status" class="form-control form-control-sm">
                        <option value="1">Công khai</option>
                        <option value="0">Bị Ẩn</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="post_thumbnail">Hình ảnh đại diện bài viết (Thumbnail)</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="post_thumbnail" name="post_thumbnail">
            </div>
            <div class="form-group">
                <label for="post_title">Tiêu đề bài viết</label>
                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Tiêu đề bài viết...">
            </div>
            <div class="form-group">
                <label for="post_content">Nội dung bài viết</label>
                <textarea style="resize: none;" class="form-control" id="editor1" name="post_content" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="post_meta_desc">Meta mô tả (SEO)</label>
                <input type="text" class="form-control" id="post_meta_desc" name="post_meta_desc" placeholder="Meta mô tả bài viết...">
            </div>
            <div class="form-group">
                <label for="post_meta_keywords">Meta từ khoá (SEO)</label>
                <input type="text" class="form-control" id="post_meta_keywords" name="post_meta_keywords" placeholder="Meta từ khoá bài viết...">
            </div>
            
            <button type="submit" name="add_post" class="btn btn-grape">Thêm bài viết</button>
        </form>
    </div>
</div>
<!-- Success Modal-->

    <!-- CKEditor/CKFinder-->
    <script src="{{asset('public/ckeditor1/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endsection