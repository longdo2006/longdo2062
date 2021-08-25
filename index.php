<?php
ob_start();
session_start();
define('SECURITY', true);
include_once('connect/connect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/success.css">
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="css/search.css">
    <script src="https://kit.fontawesome.com/867879b3ff.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>

    <!--	Header	-->
    <div id="header">
        <!-- marquee -->
        <?php include_once('modules/marquee/marquee.php'); ?>
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <?php include_once('modules/logo/logo.php'); ?>
                <!--Search_box  -->
                <?php include_once('modules/search/search_box.php'); ?>
                <!-- cart_notify -->
                <?php include_once('modules/cart/cart_notify.php'); ?>
            </div>
        </div>
        <div id="menu_border">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <?php include_once('modules/menu/list_menu.php'); ?>


                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <?php include_once('modules/menu/menu.php'); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!--	End Header	-->


    <!--	Body	-->
    <div id="body">
        <div id="page_name">
            <p>
                <?php

                if(isset($_GET['page_layout'])){
                    switch($_GET['page_layout']){
                        case 'cart':
                            echo 'Giỏ hàng';
                            
                            break;
                        case 'success':
                            echo 'Đặt hàng thành công!';
                            break;
                        case 'search':
                            echo 'Danh sách sản phẩm';
                            
                            break;
                        case 'product':
                            echo 'Chi tiết sản phẩm';
                            break;
                        case 'category':
                            echo 'Danh sách sản phẩm';
                            
                            break;
                        case 'contact':
                            echo 'Liên hệ';
                            break;
                        case 'infor':
                            echo 'Về chúng tôi';
                            break;
                        case 'service':
                            echo 'Dịch vụ';
                            break;
                    }
                    
                }
                else{
                    echo 'Trang chủ';
                }
            

                ?>
            </p>
        </div>
        <div class="container">


            <div class="row">


                <?php

                if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'cart':
                            include_once('modules/category/list_category.php');
                            include_once('modules/cart/cart.php');
                            
                            break;
                        case 'success':
                            include_once('modules/cart/success.php');
                            break;
                        case 'search':
                            include_once('modules/category/list_category.php');
                            include_once('modules/search/search.php');
                            
                            break;
                        case 'product':
                            include_once('modules/product/product.php');
                            break;
                        case 'category':
                            include_once('modules/category/list_category.php');
                            include_once('modules/category/category.php');
                            
                            break;
                        case 'contact':
                            include_once('modules/contact/contact.php');
                            break;
                        case 'infor':
                            include_once('modules/infor/infor.php');
                            break;
                        case 'service':
                            include_once('modules/service/service.php');
                            break;
                    }
                } else {
                    include_once('modules/category/list_category.php');
                    include_once('modules/product/list_product.php');
                }

                ?>



            </div>

        </div>
    </div>
    <!--	End Body	-->

    <div id="footer-top">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <?php include_once('modules/logo/logo_footer.php'); ?>
                <!-- address -->
                <?php include_once('modules/footer/address.php'); ?>
                <!-- policy -->
                <?php include_once('modules/footer/policy.php'); ?>
                <!-- hotline -->
                <?php include_once('modules/footer/hotline.php'); ?>
            </div>
        </div>

        <!-- telephone -->
        <div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel:0987654321" class="pps-btn-img">
                        <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                    </a>
                </div>
            </div>
            <div class="hotline-bar">
                <a href="tel:0912.051.299">
                    <span class="text-hotline">0912.051.299</span>
                </a>
            </div>
        </div>
    </div>

    <!--	Footer	-->
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        2021 © Make by HDD. Goodluck for you!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--	End Footer	-->
</body>


</html>