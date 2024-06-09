<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập - Laptop LT</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{('public/client/img/ico-logo.ico')}}">
    <!-- <link href="{{asset('public/server/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('public/server/css/sb-admin-2.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
        background-image: url('https://laptopbachkhoa.net/wp-content/uploads/2021/03/laptop2_800x450.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
        }

        .container{
        height: 100%;
        align-content: center;
        }

        .card{
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
        }

        .social_icon span:hover{
        color: white;
        cursor: pointer;
        }

        .card-header h3{
        color: white;
        }

        .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
        }

        .input-group-prepend span{
        width: 50px;
        background-color: #FFC312;
        color: black;
        border:0 !important;
        }

        input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

        }

        .remember{
        color: white;
        }

        .remember input
        {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
        }

        .login_btn{
        color: black;
        background-color: #FFC312;
        width: 100px;
        }

        .login_btn:hover{
        color: black;
        background-color: white;
        }
        .links{
        color: white;
        }

        .links a{
        margin-left: 4px;
        }
    </style>
</head>
<body class="bg-body">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng nhập</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
                    <form class="user" action="{{route('client.login.handle')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group form-group">
						    <div class="input-group-prepend">
				                <span class="input-group-text"><i class="fas fa-user"></i></span>
			                </div>
			                <input type="text" name="client_user" class="form-control form-control-user" placeholder="Tên đăng nhập...">
    	                </div>
                        <div class="input-group form-group">
			                <div class="input-group-prepend">
				                <span class="input-group-text"><i class="fas fa-key"></i></span>
			                </div>
			                <input type="password" name="client_password" class="form-control form-control-user" placeholder="Mật khẩu...">
		                </div>
                        <p style="color: red; font-size: 12px;">
                            <?php
                                $status = session('status');
                                if ($status) {
                                    echo $status;
                                    Session::put('status', null);
                                }
                            ?>
                        </p>
                    <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
                    <br>
                    <button type="submit" class="btn btn-warning btn-user btn-block">Đăng nhập</button>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Bạn chưa có tài khoản?<a href="{{route('client.register')}}" style="color:yellow;">Đăng ký</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="page-forgot-password.html"style="color:yellow;">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>