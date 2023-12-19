<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Đăng Ký</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-6 py-2">
                <img width="100%" src="view/assets/img/banner/banner_signup.png" alt="">
            </div>
            <form class="col-md-6" method="POST" action="">
                <?php if (isset($message) && !empty($message)) : ?>
                    <div class="alert alert-<?= isset($registerStatus) && $registerStatus == true ? 'success' : 'danger' ?>" role="alert"><?= $message ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" class="form-control" name="full-name" id="firstInput" placeholder="Họ và tên">
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
                </div>
                <div class="form-group">
                    <label for="numberphone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" id="numberphone" placeholder="Số điện thoại">
                </div>
                <p class="text-left">Quay lại?<a class="text-primary" href="index.php?act=login">Đăng nhập</a></p>
                <button type="submit" name="submit-register" class="btn btn-main">Đăng Ký</button>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->