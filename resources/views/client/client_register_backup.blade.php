<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng kí tài khoản - Laptop LT</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{('public/client/img/ico-logo.ico')}}">
    <link href="{{asset('public/server/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('public/server/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-body">
    <div class="container">
        <div class="row justify-content-center mt-0">
            <div class="col-xl-12 col-lg-12 col-md-9 mt-0">
                <div class="card o-hidden border-0 shadow-lg my-0">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <form class="user" action="{{route('client.register.handle')}}" method="post">
                                    {{csrf_field()}}
                                        <div class="text-center">
                                            <h3 class="h4 text-warning mb-4">Tài khoản</h3>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="client_user" class="form-control form-control-user" placeholder="Tên đăng nhập...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="client_password" class="form-control form-control-user" placeholder="Mật khẩu...">
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <h3 class="h4 text-warning mb-4">Thông tin</h3>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" placeholder="Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control form-control-user" placeholder="Số điện thoại...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="street_address" class="form-control form-control-user" placeholder="Địa chỉ đường...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="district" class="form-control form-control-user" placeholder="Quận / Huyện...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control form-control-user" placeholder="Thành Phố...">
                                        </div>
                                        <p style="color: red; font-size: 12px;">
                                            <?php
                                            use Illuminate\Support\Facades\Session;
                                            $message = Session::get('message');
                                            if ($message) {
                                                echo $message;
                                                Session::put('message', null);
                                            }
                                            ?>
                                        </p>
                                        <button type="submit" class="btn btn-warning btn-user btn-block">Đăng kí</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Đã có tài khoản? đăng nhập nào</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('public/server/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/server/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/server/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('public/server/js/sb-admin-2.min.js')}}"></script>
</body>
</html>