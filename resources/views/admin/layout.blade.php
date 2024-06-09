<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Laptop LT - Thế giới công nghệ</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL('public/client/img/logo-image.png')}}"> 
    <!-- {URL('public/client/img/ico-logo.ico')}} -->
    <link href="{{asset('public/server/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('public/server/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/server/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3">
                <?php
                use Illuminate\Support\Facades\Session;
                $name = Session::get('admin_name');
                if ($name) {
                    echo $name;
                } else {
                    echo 'Đăng nhập';
                }
                ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class=" text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <hr class="sidebar-divider mt-n3 my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{URL('/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Thống kê</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">Quản lý chung</div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseOrder">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Đơn hàng</span>
                </a>
                <div id="collapseOrder" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('order.waiting')}}">Danh sách chờ</a>
                        <a class="collapse-item" href="{{route('order.handled')}}">Danh sách đã xử lí</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWeb" aria-expanded="true" aria-controls="collapseWeb">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý Banner</span>
                </a>
                <div id="collapseWeb" class="collapse" aria-labelledby="headingWeb" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{('them-doi-tac')}}">Thêm Partner</a>
                        <a class="collapse-item" href="{{('doi-tac')}}">Danh sách Partner</a>
                        <a class="collapse-item" href="{{('them-slider')}}">Thêm Slider</a>
                        <a class="collapse-item" href="{{('slider')}}">Danh sách slider</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember" aria-expanded="true" aria-controls="collapseMember">
                    <i class="fas fa-users"></i>
                    <span>Thành viên</span>
                </a>
                <div id="collapseMember" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('user.add')}}">Thêm tài khoản</a>
                        <a class="collapse-item" href="{{route('list.client')}}">Danh sách khách hàng</a>
                        <a class="collapse-item" href="{{route('list.staff')}}">Danh sách nhân viên</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
                    <i class="far fa-folder-open"></i>
                    <span>Danh mục sản phẩm</span>
                </a>
                <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{('add-category-product')}}">Thêm danh mục</a>
                        <a class="collapse-item" href="{{('list-categories-product')}}">Danh sách danh mục</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                    <i class="fab fa-product-hunt"></i>
                    <span>Sản phẩm</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{('add-product')}}">Thêm sản phẩm</a>
                        <a class="collapse-item" href="{{('list-product')}}">Danh sách sản phẩm</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCoupon" aria-expanded="true" aria-controls="collapseCoupon">
                    <i class="fas fa-percentage"></i>
                    <span>Mã giảm giá</span>
                </a>
                <div id="collapseCoupon" class="collapse" aria-labelledby="headingCoupon" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{('insert-coupon')}}">Thêm mã giảm giá</a>
                        <a class="collapse-item" href="{{('list-coupon')}}">Danh sách mã giảm giá</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShip" aria-expanded="true" aria-controls="collapseShip">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Vận chuyển</span>
                </a>
                <div id="collapseShip" class="collapse" aria-labelledby="headingShip" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{('delivery')}}">Quản lý vận chuyển</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage" aria-expanded="true" aria-controls="collapseMessage">
                <i class="far fa-envelope"></i>
                    <span>Thư liên hệ</span>
                </a>
                <div id="collapseMessage" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="utilities-color.html">Tư vấn, hỏi đáp</a>
                        <a class="collapse-item" href="utilities-border.html">Báo cáo sự cố</a>
                        <a class="collapse-item" href="utilities-border.html">Yêu cầu xử lý</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategoriesPost" aria-expanded="true" aria-controls="collapseCategories">
                    <i class="far fa-folder-open"></i>
                    <span>Danh mục bài viết</span>
                </a>
                <div id="collapseCategoriesPost" class="collapse" aria-labelledby="headingCategoriesPost" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('cate.post.add')}}">Thêm danh mục</a>
                        <a class="collapse-item" href="{{route('cate.post.list')}}">Danh sách danh mục</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParagraph" aria-expanded="true" aria-controls="collapseParagraph">
                    <i class="fas fa-newspaper"></i>
                    <span>Bài viết</span>
                </a>
                <div id="collapseParagraph" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('post.add')}}">Thêm bài viết</a>
                        <a class="collapse-item" href="{{route('post.list')}}">Danh sách bài viết</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Cài đặt</div>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-user"></i>
                    <span>Thông tin cá nhân</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-shield-alt"></i>
                    <span>Mật khẩu và bảo mật</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập từ khóa tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-grape" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">3</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{URL('public/server/img/undraw_profile_1.svg')}}" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{URL('public/server/img/undraw_profile_2.svg')}}" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="{{URL('public/server/img/undraw_profile_3.svg')}}" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    $name = Session::get('admin_name');
                                    if ($name) {
                                        echo $name;
                                    } else {
                                        echo 'Đăng nhập';
                                    }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="{{URL('public/server/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Hồ sơ
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Cài đặt
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('admin_content')
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Coppyright©2021 Laptop LT All Rights Reserved | Designed by LT Team</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất không?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn kết thúc phiên hiện đăng nhập của mình!</div>
                <div class="modal-footer">
                    <a class="btn btn-success" href="{{URL('/logout')}}">Đăng xuất</a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Trở lại</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/server/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/server/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/server/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/server/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/server/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/server/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/server/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/server/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/server/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/server/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/server/js/demo/datatables-demo.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url : '{{url('/select-feeship')}}',
                        method: 'POST',
                        data:{_token:_token},
                        success:function(data){
                            $('#load_delivery').html(data); 
                        }
                    });
            }
             
            $(document).on('blur','.fee_feeship_edit',function(){
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                        url : '{{url('/update-delivery')}}',
                        method: 'POST',
                        data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                        success:function(data){
                            fetch_delivery();
                        }
                    });
            })

            $('.add_delivery').click(function(){
                var city = $('.city').val();
                var province = $('.province').val(); 
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url : '{{url('/insert-delivery')}}',
                    method: 'POST',
                    data:{city:city, province:province, wards:wards, fee_ship:fee_ship, _token:_token},
                    success:function(data){
                        fetch_delivery();
                        // alert('Thêm phí vận chuyển thành công');
                    }
                });
            });

            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if(action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action, ma_id:ma_id, _token:_token},
                    success:function(data){
                        $('#'+result).html(data); 
                    }
                });
            });
        })   
           
    </script>

</body>
</html>