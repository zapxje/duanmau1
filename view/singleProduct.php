<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="active">Chi tiết sản phẩm</li>
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                    </div>
                    <?php if (!empty($listImagesProduct)) : ?>
                        <?php foreach ($listImagesProduct as $image) : ?>
                            <div class="product-preview">
                                <img src="view/assets/img/product/<?= $image['name'] ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                    </div>
                    <?php if (!empty($listImagesProduct)) : ?>
                        <?php foreach ($listImagesProduct as $image) : ?>
                            <div class="product-preview">
                                <img src="view/assets/img/product/<?= $image['name'] ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details" data-id="<?= $product['id'] ?>">
                    <h2 class="product-name product-name-single"><?= $product['name'] ?></h2>
                    <div>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a class="review-link" href="#">10 Đánh giá | Add your review</a>
                    </div>
                    <h3 class="product-price">
                        <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') . 'đ' : number_format($product['price'], 0, ',', '.') . 'đ' ?>
                        <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') . 'đ' : '' ?></del>
                        <span class="product-available"><?= $product['quantity'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></span>
                    </h3>
                    <?php if (!empty($listProperties)) : ?>
                        <div class="table-properties">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-4">Tên thuộc tính</th>
                                        <th class="col-8">Thông số</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listProperties as $property) : ?>
                                        <tr>
                                            <td><?= $property['name'] ?></td>
                                            <td><?= $property['description'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p>Trống</p>
                    <?php endif; ?>

                    <!-- <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div> -->

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Số lượng
                            <div class="input-number">
                                <input type="number" id="countInput" name="count" value="1">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                    </div>

                    <!-- <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul> -->

                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <li><a href="#"><?= $product['category_name'] ?></a></li>
                    </ul>
                    <ul class="product-links">
                        <li>Thương hiệu:</li>
                        <li><a href="#"><?= $product['brand_name'] ?></a></li>
                    </ul>

                    <!-- <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul> -->

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả sản phẩm</a></li>
                        <li><a data-toggle="tab" href="#tab2">Đánh giá sản phẩm</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $product['description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-4">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span>4.5</span>
                                            <div class="rating-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 80%;"></div>
                                                </div>
                                                <span class="sum">3</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: 60%;"></div>
                                                </div>
                                                <span class="sum">2</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div></div>
                                                </div>
                                                <span class="sum">0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-8">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o empty"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <!-- <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Your Name">
                                            <input class="input" type="email" placeholder="Your Email">
                                            <textarea class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div> -->
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Sản phẩm liên quan</h3>
                </div>
            </div>

            <?php foreach ($listProductRelated as $product) : ?>
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product" data-id="<?= $product['id'] ?>">
                        <a href="index.php?act=singleProduct&id=<?= $product['id'] ?>" class="">
                            <div class="product-img">
                                <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                </div>
                            </div>

                        </a>

                        <div class="product-body">
                            <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                            <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 40, "...") ?></a></h3>
                            <h4 class="product-price">
                                <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                            </h4>
                            <div class="product-rating">
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
                <!-- /product -->
            <?php endforeach; ?>

            <div class="clearfix visible-sm visible-xs"></div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
<script>
    //Validate input-number
    let countInput = document.getElementById('countInput');
    countInput.addEventListener('input', function() {
        // Lấy giá trị nhập vào
        var inputValue = this.value;

        // Kiểm tra nếu giá trị âm, đặt giá trị là 1
        if (inputValue < 1) {
            this.value = 1;
        }
    });
</script>