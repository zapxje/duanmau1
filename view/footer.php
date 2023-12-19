		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Đăng Kí Để Nhận <strong>NHIỀU ƯU ĐÃI</strong></p>
							<form>
								<input class="input" type="email" placeholder="Nhập email của bạn">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> ĐĂNG KÍ</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="https://www.facebook.com/profile.php?id=61554166256497" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.youtube.com/channel/UC48YEeHA277PJpdZhLTJIwQ" target="_blank"><i class="fa fa-youtube"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="https://www.tiktok.com/@devicetech_666" target="_blank"><i class="fa fa-tiktok"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- messenger -->
			<div class="messenger">
				<div class="messenger-logo">
					<img src="view/assets/img/messenger.png" alt="">
				</div>
				<div class="messenger-main ">
					<div class="messenger-head">
						<img src="view/assets/img/logo/logo_y.png" alt="">
						<div class="icon">
							<i class="fa-solid fa-ellipsis"></i>
							<i class="fa-solid fa-minus" id="close-messenger"></i>
						</div>
					</div>
					<div class="messenger-body show">
						<h5 class="h5">Chat với chúng tôi</h5>
						<p>Xin chào! Chúng tôi ở đây để giúp bạn. Cần gì hôm nay?</p>

						<div class="messenger-last">
							<a href="https://www.facebook.com/profile.php?id=61554166256497" target="_blank">
								<button class="btn-messenger">Bắt đầu chat</button>
							</a>
						</div>
					</div>

				</div>
				<!-- end messeger -->
			</div>
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h5 class="footer-title">Về chúng tôi</h5>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Phần Mềm Quang Trung</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+066-666-6666</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>infor@techdevice.online</a></li>
								</ul>
								<div class="certification">
									<img id="logo-congthuong" src="view/assets/img/logo-da-thong-bao-bo-cong-thuong-mau-xanh.png" alt="">
								</div>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h5 class="footer-title">hỗ trợ khách hàng</h5>
								<ul class="footer-links">
									<li><a href="#">Hỗ trợ trực tuyến</a></li>
									<li><a href="#">Thời gian hoạt động24/7</a></li>
									<li><a href="#">Đánh giá và phản hồi</a></li>
									<li><a href="#">Chính sách trả góp</a></li>
									<li><a href="#">Dịch vụ sửa chửa</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h5 class="footer-title">chính sách mua hàng</h5>
								<ul class="footer-links">
									<li><a href="#">Chính sách bảo hành</a></li>
									<li><a href="#">Chính sách đổi trả</a></li>
									<li><a href="#">Chính sách giảm giá và ưu đãi</a></li>
									<li><a href="#">Chính sách hoàn tiền</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h5 class="footer-title">Dịch vụ</h5>
								<ul class="footer-links">
									<li><a href="#">Giao hàng và vận chuyển</a></li>
									<li><a href="#">Đóng gói cẩn thận</a></li>
									<li><a href="#">Thẻ quà tặng và voucher</a></li>

								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script>
			document.querySelector(".send-form").addEventListener("click", (event) => {
				event.stopPropagation();
			});
			// Chuỗi JSON từ PHP
			var jsonString = '<?= $jsonProducts; ?>';

			// Chuyển đổi chuỗi JSON thành mảng JavaScript
			var productsArray = JSON.parse(jsonString);

			// Hiển thị mảng JavaScript trong console (để kiểm tra)
		</script>
		<script src="view/assets/js/jquery.min.js"></script>
		<script src="view/assets/js/bootstrap.min.js"></script>
		<script src="view/assets/js/slick.min.js"></script>
		<script src="view/assets/js/nouislider.min.js"></script>
		<script src="view/assets/js/jquery.zoom.min.js"></script>
		<script type="module" src="view/assets/js/main.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

		<?php
		$minPriceProduct = isset($minPriceProduct) ? $minPriceProduct : 0;
		$maxPriceProduct = isset($maxPriceProduct) ? $maxPriceProduct : 0;
		?>
		<script>
			$('.price_from').val(<?= isset($price_from) ? $price_from : $minPriceProduct ?>);
			$('.price_to').val(<?= isset($price_to) ? $price_to : $maxPriceProduct / 2 ?>);
			$(function() {
				$("#slider-range").slider({
					range: true,
					min: <?= isset($minPriceProduct) ? $minPriceProduct : 0 ?>,
					max: <?= isset($maxPriceProduct) ? $maxPriceProduct : 0 ?>,
					values: [<?= isset($price_from) ? $price_from : $minPriceProduct ?>,
						<?= isset($price_to) ? $price_to : ($maxPriceProduct  / 2) ?>
					],
					slide: function(event, ui) {
						$("#amount").val(addPlus(ui.values[0]).toString() + "đ" + " - " + addPlus(ui.values[1]) + "đ");
						//Khi kéo thì cập nhật giá vào hidden giá
						$('.price_from').val(ui.values[0]);
						$('.price_to').val(ui.values[1]);
					}
				});
				$("#amount").val(addPlus($("#slider-range").slider("values", 0)) + "đ" + " - " +
					addPlus($("#slider-range").slider("values", 1)) + "đ");
			});

			function addPlus(nStr) {
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + '.' + '$2');
				}
				return x1 + x2;
			}
		</script>
		</body>

		</html>