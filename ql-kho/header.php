<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:login.php");
}
?>
<?php
include("ketnoi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Quản lý kho hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        h1.tieudeform {
            text-align: center;
            text-transform: uppercase;
            color: #2b4f65;
            /* Thay đổi màu chữ */
            margin: 20px;
        }

        label {
            margin: 5px;
            color: #2b4f65;
            /* Thay đổi màu chữ */
        }

        td,
        th {
            text-align: center;
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        .nav-link {
            color: #2b4f65;
            /* Thay đổi màu chữ của menu */
        }
        .navbar-brand {
            color: #fff;
            /* Thay đổi màu chữ của navbar-brand */
        }
        .navbar-nav .nav-link {
            color: #fff;
            /* Thay đổi màu chữ của các menu item trong navbar */
        }
        .dropdown-menu {
            background-color: #2b4f65;
            /* Thay đổi màu nền dropdown menu */
        }

        .dropdown-item {
            color: #fff;
            /* Thay đổi màu chữ trong dropdown item */
        }
   
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-primary">
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand ps-3" href="index.php">Quản Lý Kho Hàng Thiết Bị</a>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-5 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> -->
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"><?php if (isset($_SESSION["name"])) echo $_SESSION["name"]; ?></a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="xli_logout.php?flag=1">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-primary bg-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Trang chủ
                        </a>
                        <a class="nav-link collapsed" href="thuonghieu.php">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-codepen"></i></div>
                            Thương hiệu
                        </a>
                        <a class="nav-link collapsed" href="loaisanpham.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-diamond"></i></div>
                            Loại sản phẩm
                        </a>
                        <a class="nav-link collapsed" href="donvitinh.php">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-unity"></i></div>
                            Đơn vị tính
                        </a>
                        <a class="nav-link collapsed" href="sanpham.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                            Sản phẩm
                        </a>
                        <a class="nav-link collapsed" href="nhanvien.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-user"></i></div>
                            Nhân viên
                        </a>
                        <a class="nav-link collapsed" href="khohang.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-warehouse"></i></div>
                            Kho hàng
                        </a>
                        <a class="nav-link collapsed" href="nhacungcap.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
                            Nhà cung cấp
                        </a>
                        <a class="nav-link collapsed" href="khachhang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Khách hàng
                        </a>
                        <a class="nav-link collapsed" href="phieuxuathang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Mượn hàng hóa
                        </a>

                        <li class="nav-item dropdown">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                                Thống kê
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="thongke_soluong_xuat.php">Thống kê số lượng mượn</a>
                                    <!-- <a class="nav-link" href="thongketonkho.php">Thống kê số lượng tồn kho</a> -->
                                </nav>
                            </div>
                            <div class="collapse" id="collapseXuatHang" aria-labelledby="headingXuatHang" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="phieuxuathang.php">Danh sách</a>
                                </nav>
                            </div>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="container">