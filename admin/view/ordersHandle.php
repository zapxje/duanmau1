<!-- Tiêu Đề -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Đơn hàng đang xử lí</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Bảng điều khiển</a></li>
                    <li class="active">Đơn hàng đang xử lí</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Tiêu Đề -->

<!-- Nội Dung -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <!-- Thông báo  -->
            <div>
                <?php if (isset($notification)) : ?>
                    <div class="sufee-alert alert with-close alert-<?= $notification === 'successDel' ? 'warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'danger' : 'success') ?> alert-dismissible fade show">
                        <span class="badge badge-pill badge-<?= $notification === 'successDel' ? 'warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'danger' : 'success') ?>">
                            <?= $notification === 'successDel' ? 'Warning' : ($notification === 'notExist' || $notification === 'alreadyExist' || $notification === 'failedDel' || $notification === 'failedFormat' ? 'Failed' : 'Success') ?>
                        </span>
                        <?= $notification === 'successAdd' ? 'Xác nhận thành công !' : ($notification === 'failedFormat' ? 'Định dạng ảnh không phù hợp !' : ($notification === 'notExist' ? 'Hóa đơn không tồn tại' : ($notification === 'alreadyExist' ? 'Ảnh sản phẩm đã tồn tại !' : ($notification === 'successDel' ? 'Xóa sản phẩm thành công !' : ($notification === 'failedDel' ? 'Thương hiệu hiện chứa sản phẩm !' : 'Cập nhật thương hiệu thành công !'))))) ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Thông báo  -->
            <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: auto;">Mã Đơn</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="min-width: 100px;">Tên KH</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">SĐT</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">Địa chỉ</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">Ghi chú</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">HTTT</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">Tổng tiền</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">Chi tiết</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: auto;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listOrders as $order) : ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?= $order['code_order'] ?></td>
                                        <td><?= $order['name'] ?></td>
                                        <td><?= $order['phone'] ?></td>
                                        <td><?= $order['address'] ?></td>
                                        <td><?= $order['note'] ?></td>
                                        <td><?= $order['payment_method'] ?></td>
                                        <td><?= number_format($order['total_order'], 0, ',', '.') ?></td>
                                        <td><a href="index.php?act=ordersHandle&idOrder=<?= $order['id'] ?>&orderDetailHandle"><button class="btn btn-primary">Chi tiết ĐH</button></a></td>
                                        <td><a href="index.php?act=ordersHandle&idOrder=<?= $order['id'] ?>&confirmOrderDone"><button class="btn btn-success" onclick="return confirm('Bạn có chắc chắn xác nhận đơn hàng này !')">Xác nhận hoàn thành</button></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Nội Dung -->