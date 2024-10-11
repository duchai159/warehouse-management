<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập</title>
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            border-bottom: none;
        }

        .card-body {
            padding: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #2b4f65;
            border-color: #2b4f65;
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-cancel {
            background-color: transparent;
            color: #2b4f65;
            border-color: #2b4f65;
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-cancel:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body style="margin: 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <img src="https://accounts.haravan.com/img/login_banner.svg" width="500" alt="">
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                            <h3 class="h5 text-gray-900 mb-4">KHO QUẢN LÝ HÀNG HÓA</h3>
                            <p>Xin chào, vui lòng nhập thông tin đăng nhập</p>
                        </div>
                        <form class="user" action="xli_login.php" method="post">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="txtTenDangNhap" name="txtTenDangNhap"
                                    placeholder="Tên đăng nhập" required autofocus>
                                <label for="txtTenDangNhap">Tên đăng nhập</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="txtMatKhau" type="password" name="txtMatKhau"
                                    placeholder="Mật khẩu">
                                <label for="txtMatKhau">Mật khẩu</label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>