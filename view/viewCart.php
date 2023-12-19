<div class="untree_co-section before-footer-section">
	<div class="container">
		<div class="row mb-5">
			<form class="col-md-12" method="post">
				<div class="site-blocks-table">
					<table class="table">
						<thead>
							<img src="" alt="">
							<tr>
								<th class="product-thumbnail">Hình ảnh</th>
								<th class="product-name">Sản phẩm</th>
								<th class="product-price">Đơn giá</th>
								<th class="product-quantity">Số lượng</th>
								<th class="product-total">Tổng tiền</th>
								<th class="product-remove">Xóa</th>
							</tr>
						</thead>
						<tbody class="view-cart">

						</tbody>
					</table>
				</div>
			</form>
		</div>

		<div class="row sub-cart">
			<div class="col-md-6 ">
				<div class="row mb-5">

					<div class="col-md-6">
						<a href="?act=products"><button class="primary-btn order-submit">Tiếp tục mua sắm</button></a>
					</div>
				</div>
				<div class="row coupon">
					<div class="col-md-12">
						<label class="text-black h4" for="coupon">Coupon</label>
						<p>Nhập mã giảm giá (nếu có).</p>
					</div>
					<div class="col-md-8 mb-3 mb-md-0">
						<input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
					</div>
					<div class="col-md-4">
						<button class="primary-btn order-submit" id="apply">Nhập mã giảm</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 pl-5">
				<div class="row cart__total">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12 text-right border-bottom mb-5">
								<h3 class="text-black h4 text-uppercase">Tổng đơn hàng</h3>
							</div>
						</div>
						<div class="row mb-3 cart__total-sub ">
							<div class="col-md-6">
								<span class="text-black">Tổng tiền</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black" id="subTotal"></strong>
							</div>
						</div>
						<div class="row mb-5 cart__total-main ">
							<div class="col-md-6">
								<span class="text-black">Thanh toán</span>
							</div>
							<div class="col-md-6 text-right">
								<strong class="text-black" id="priceTotal"></strong>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<a href="index.php?act=checkout" id="checkoutBtn" class="primary-btn order-submit">
									Tiến hàng thanh toán
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>