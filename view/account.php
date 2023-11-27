<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Thông Tin</li>
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
            <div class="sidebar col-md-3">
                <div class="account-nav">
                    <div class="row sidebar-header-account">
                        <div class="col-md-4 sidebar-avatar">
                            <?php if ($_SESSION['user']['avatar'] && !empty($_SESSION['user']['avatar'])) : ?>
                                <img src="<?= $_SESSION['user']['avatar'] ?>" alt="">
                            <?php else : ?>
                                <i class="fa fa-user-circle"></i>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8 sidebar-username">
                            <p> <?= $_SESSION['user']['username'] ?></p>
                        </div>
                    </div>

                    <ul>
                        <li class="active">
                            <a data-toggle="tab" href="#tab1">Tài khoản</a>
                        </li>
                        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) : ?>
                            <li>
                                <a data-toggle="tab" href="#tab2">Mật khẩu</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3">Đơn hàng</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="index.php?act=logout">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content col-md-9">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab 1 -->
                            <div id="tab1" class="tab-pane active">
                                <div class="title-form">Thông Tin Tài Khoản</div>
                                <form action="index.php?act=updateUser&id=<?= $_SESSION['user']['id'] ?>" method="POST" class="form-account" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="">Tên đăng nhập</label>
                                            <input type="text" name="username" class="form-control" value="<?= $_SESSION['user']['username'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tên đầy đủ</label>
                                            <input type="text" name="full_name" class="form-control" value="<?= $_SESSION['user']['full_name'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $_SESSION['user']['phone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" value="<?= empty($_SESSION['user']['address']) ? '' : $_SESSION['user']['address'] ?>" placeholder="<?= empty($_SESSION['user']['address']) ? 'Trống' : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thay đổi avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                    <input type="hidden" name="old_image" value="<?= $_SESSION['user']['avatar'] ?>">
                                    <button type="submit" name="submit-updateUser" class="btn btn-main">Lưu lại</button>
                                </form>
                            </div>
                            <!-- /tab 1 -->
                            <!-- tab 2 -->
                            <div id="tab2" class="tab-pane">
                                <div class="title-form">Thay đổi mặt khẩu</div>
                            </div>
                            <!-- /tab 2 -->
                            <!-- tab 3 -->
                            <div id="tab3" class="tab-pane">
                            <div class="title-form">Chi tiết đơn hàng</div>
                            </div>
                            <!-- /tab 3 -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->