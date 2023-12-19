<!-- Tiêu Đề -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chỉnh sửa sản phẩm</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Bảng điều khiển</a></li>
                    <li><a href="index.php?act=products">Danh sách sản phẩm</a></li>
                    <li class="active">Chỉnh sửa sản phẩm</li>
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
            <form action="index.php?act=updateProduct&id=<?= $product['id'] ?>&update" method="post">
                <div class="form-group">
                    <label for="" class="control-label mb-1">Tên sản phẩm</label>
                    <input name="name" type="text" class="form-control" value="<?= $product['name'] ?>" oninvalid="this.setCustomValidity('Nhập tên sản phẩm !')" oninput="setCustomValidity('')" required>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label for="" class="control-label mb-1">Giá gốc</label>
                        <input name="price" type="number" class="form-control" value="<?= $product['price'] ?>" oninvalid="this.setCustomValidity('Nhập giá sản phẩm !')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="" class="control-label mb-1">Giá giảm (nếu có)</label>
                        <input name="price_sale" type="number" class="form-control" value="<?= isset($product['price_sale']) ? $product['price_sale'] : '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-1">Số lượng</label>
                    <input name="quantity" type="number" class="form-control" value="<?= $product['quantity'] ?>">
                </div>
                <div class="form-group has-success">
                    <label for="" class="control-label mb-1">Mô tả</label>
                    <textarea name="description" rows="5" placeholder="Mô tả sản phẩm" class="form-control"><?= $product['description'] ?></textarea>
                </div>
                <div class="modal-footer">
                    <a href="index.php?act=categories"><button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button></a>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Nội Dung -->