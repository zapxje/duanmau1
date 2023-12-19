<!-- Tiêu Đề -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chi tiết hóa đơn</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Bảng điều khiển</a></li>
                    <li><a href="index.php?act=ordersDone">Đơn hàng hoàn thành</a></li>
                    <li class="active">Chi tiết hóa đơn</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Tiêu Đề -->

<!-- Nội Dung -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title"></strong>
        </div>
        <div class="card-body">
            <div class="float-right my-2">
                <a href="index.php?act=ordersDone">
                    <button type="button" class="btn btn-secondary mb-1">
                        Quay lại
                    </button>
                </a>
            </div>
            <!-- Thông báo  -->
            <div>
                <?php if (isset($notification)) : ?>
                    <div class="sufee-alert alert with-close alert-<?= $notification === 'successDel' ? 'warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'danger' : 'success') ?> alert-dismissible fade show">
                        <span class="badge badge-pill badge-<?= $notification === 'successDel' ? 'warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'danger' : 'success') ?>">
                            <?= $notification === 'successDel' ? 'Warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'Failed' : 'Success') ?>
                        </span>
                        <?= $notification === 'successAdd' ? 'Thêm thương hiệu thành công !' : ($notification === 'failedFormat' ? 'Định dạng ảnh không phù hợp !' : ($notification === 'notExist' ? 'Thương hiệu không tồn tại' : ($notification === 'alreadyExist' ? 'Logo thương hiệu đã tồn tại !' : ($notification === 'successDel' ? 'Xóa thương hiệu thành công !' : ($notification === 'failedDel' ? 'Thương hiệu hiện chứa sản phẩm !' : 'Cập nhật thương hiệu thành công !'))))) ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Thông báo  -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tên SP</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;
                    foreach ($listCarts as $cart) : ?>
                        <tr>
                            <td><?= $cart['created_at'] ?></td>
                            <td style="max-width: 300px;"><?= $cart['product_name'] ?></td>
                            <td><?= number_format($cart['price'], 0, ',', '.') ?></td>
                            <td><?= number_format($cart['quantity'], 0, ',', '.') ?></td>
                            <td><?= number_format($cart['price'] * $cart['quantity'], 0, ',', '.') ?></td>
                        </tr>
                    <?php
                        $totalPrice += $cart['price'] * $cart['quantity'];
                    endforeach; ?>
                </tbody>
            </table>
            <div class="card-footer text-right">
                <strong class="card-title">Tổng: <?= number_format($totalPrice, 0, ',', '.') . "đ" ?></strong>
            </div>
        </div>
    </div>
</div>
<!-- Nội Dung -->