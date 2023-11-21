<?php
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="view/assets/img/logo/logo_y.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Tech Device</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="view/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="view/assets/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="view/assets/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="view/assets/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="view/assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="view/assets/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
                        <li><a href="javascript:void(0)"><i class="fa fa-user-o"></i> Chào <?= $_SESSION['user']['username'] ?> !</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3 col-sm-12">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <img src="view/assets/img/logo/logo_x.png" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form class="filter">
                                <select class="input-select" name="category">
                                    <option value="0">All Categories</option>
                                    <?php foreach ($listCategories as $category) : ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input class="input" placeholder="Search here" name="name">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <!-- Login -->
                                <div class="dropdown">
                                    <a class="user-login dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <?php if ($_SESSION['user']['avatar'] && !empty($_SESSION['user']['avatar'])) : ?>
                                            <div><img src="view/assets/img/avatar/<?= $_SESSION['user']['avatar'] ?>" alt=""></div>
                                            <span>Tài khoản</span>
                                        <?php else : ?>
                                            <i class="fa fa-user-circle"></i>
                                            <span>Tài khoản</span>
                                        <?php endif; ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#" class="my-account">Thông tin</a></li>
                                        <!-- <li><a href="#">chỉnh sửa</a></li> -->
                                        <li role="separator" class="divider"></li>
                                        <li><a href="?act=logout">Đăng xuất</a></li>
                                    </ul>
                                </div>
                                <!-- <div class="container">
                                    <div class="row">
                                        <div class="wrapper-account ">
                                            <div class="my__account col-md-5">
                                                <div class="my__account-close">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div class="my__account-img">
                                                    <?php if ($_SESSION['user']['avatar'] && !empty($_SESSION['user']['avatar'])) : ?>
                                                        <img src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                                                    <?php else : ?>
                                                        <i class="fa fa-user-circle"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <form action="index.php?act=updateUser&id=<?= $_SESSION['user']['id'] ?>" method="POST" class="form-account" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="">thay đổi Avatar</label>
                                                        <input type="file" name="avatar" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tên đăng nhập</label>
                                                        <input type="text" name="username" class="form-control" value="<?= $_SESSION['user']['username'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">email</label>
                                                        <input type="text" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">phone</label>
                                                        <input type="text" name="phone" class="form-control" value="<?= $_SESSION['user']['phone'] ?>">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="<?= $_SESSION['user']['avatar'] ?>">
                                                    <button type="submit" name="submit-updateUser" class="btn btn-main">Lưu lại</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <?php else : ?>
                                <div>
                                    <a href="index.php?act=login">
                                        <i class="fa fa-user-circle"></i>
                                        <span>Đăng Nhập</span>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <!-- /Login -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Giỏ Hàng</span>
                                    <div class="qty">3</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="view/assets/img/product01.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="view/assets/img/product02.png" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>3 Item(s) selected</small>
                                        <h5>SUBTOTAL: $2940.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="index.php?act=viewCart">View Cart</a>
                                        <a href="index.php?act=checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="?act=store">Sản Phẩm</a></li>
                    <li><a href="?act=about">Thông Tin</a></li>
                    <li><a href="?act=contact">Liên Hệ</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->