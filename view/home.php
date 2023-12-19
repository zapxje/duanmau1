<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="view/assets/img/shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Các sản phẩm<br>Laptop</h3>
                        <a href="index.php?act=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="view/assets/img/19286c1f-272a-4207-a1db-5cf7310f5d59.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Chuột máy tính<br>& Bàn phím</h3>
                        <a href="index.php?act=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="view/assets/img/shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Các sản phẩm<br>Tai nghe</h3>
                        <a href="index.php?act=store" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION NEW PRODUCT -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php foreach ($listCategories as $index => $category) : ?>
                                <li class="<?= $index === 0 ? 'active' : '' ?>">
                                    <a data-toggle="tab" href="#tabNew<?= $category['id'] ?>"><?= $category['name'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php foreach ($listCategories as $index => $category) : ?>
                            <!-- tab -->
                            <div id="tabNew<?= $category['id'] ?>" class="tab-pane <?= $index === 0 ? 'active' : '' ?>">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php
                                    $listProductByCategoryNew = getProductByCategoryNew($category['id']);
                                    foreach ($listProductByCategoryNew as $product) : ?>
                                        <!-- product -->
                                        <div class="product" data-id="<?= $product['id'] ?>">
                                            <a href="index.php?act=singleProduct&id=<?= $product['id'] ?>">
                                                <div class="product-img">
                                                    <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <?php if (isSale($product) == 1) : ?>
                                                            <span class="sale">-<?= round(($product['price'] - $product['price_sale']) / $product['price'] * 100) ?>%</span>
                                                        <?php endif; ?>
                                                        <?php if (isNew($product['id_category'], $product) == 1) : ?>
                                                            <span class="new">NEW</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                                <h3 class="product-name">
                                                    <a href="index.php?act=singleProduct&id=<?= $product['id'] ?>">
                                                        <?= mb_strimwidth($product['name'], 0, 45, "...") ?>
                                                    </a>
                                                </h3>
                                                <h4 class="product-price">
                                                    <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') . 'đ' : number_format($product['price'], 0, ',', '.') . 'đ' ?>
                                                    <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') . 'đ' : '' ?></del>
                                                </h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- <div id="slick-nav-1" class="products-slick-nav"></div> -->
                            </div>
                            <!-- /tab -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION NEW PRODUCT -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3 class="countdown-days">00</h3>
                                <span>Ngày</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="countdown-hours">00</h3>
                                <span>Giờ</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="countdown-minutes">00</h3>
                                <span>Phút</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="countdown-seconds">00</h3>
                                <span>Giây</span>
                            </div>
                        </li>
                    </ul>
                    <b class="countdown-nofitication text-danger text-uppercase"></b>
                    <h2 class="text-uppercase">Tuần lễ vàng</h2>
                    <p>Nhiều ưu đãi giảm giá lên đến 50%</p>
                    <a class="primary-btn cta-btn" href="index.php?act=store">Mua Ngay</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION TOPSELLING PRODUCT -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm bán chạy</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <?php foreach ($listCategories as $index => $category) : ?>
                                <li class="<?= $index === 0 ? 'active' : '' ?>">
                                    <a data-toggle="tab" href="#tabTop<?= $category['id'] ?>"><?= $category['name'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <?php foreach ($listCategories as $index => $category) : ?>
                            <!-- tab -->
                            <div id="tabTop<?= $category['id'] ?>" class="tab-pane <?= $index === 0 ? 'active' : '' ?>">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <?php
                                    $listProductByCategoryTop = getProductByCategoryTopselling($category['id']);
                                    foreach ($listProductByCategoryTop as $product) : ?>
                                        <!-- product -->
                                        <div class="product" data-id="<?= $product['id'] ?>">
                                            <a href="index.php?act=singleProduct&id=<?= $product['id'] ?>">
                                                <div class="product-img">
                                                    <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                                    <div class="product-label">
                                                        <?php if (isSale($product) == 1) : ?>
                                                            <span class="sale">-<?= round(($product['price'] - $product['price_sale']) / $product['price'] * 100) ?>%</span>
                                                        <?php endif; ?>
                                                        <?php if (isNew($product['id_category'], $product) == 1) : ?>
                                                            <span class="new">NEW</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                                <h3 class="product-name">
                                                    <a href="index.php?act=singleProduct&id=<?= $product['id'] ?>">
                                                        <?= mb_strimwidth($product['name'], 0, 45, "...") ?>
                                                    </a>
                                                </h3>
                                                <h4 class="product-price">
                                                    <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') . 'đ' : number_format($product['price'], 0, ',', '.') . 'đ' ?>
                                                    <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') . 'đ' : '' ?></del>
                                                </h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- <div id="slick-nav-1" class="products-slick-nav"></div> -->
                            </div>
                            <!-- /tab -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION TOPSELLING PRODUCT -->

<!-- SECTION TOP PRODUCT FOOTER -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Top Bán Chạy</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        <?php $listTopsellingFooter1 = getTopsellingFooter1() ?>
                        <?php if (!empty($listTopsellingFooter1)) : ?>
                            <?php foreach ($listTopsellingFooter1 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php $listTopsellingFooter2 = getTopsellingFooter2() ?>
                        <?php if (!empty($listTopsellingFooter2)) : ?>
                            <?php foreach ($listTopsellingFooter2 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Giảm giá sốc</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <?php $listTopdiscountFooter1 = getTopdiscountFooter1() ?>
                        <?php if (!empty($listTopdiscountFooter1)) : ?>
                            <?php foreach ($listTopdiscountFooter1 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php $listTopdiscountFooter2 = getTopdiscountFooter2() ?>
                        <?php if (!empty($listTopdiscountFooter2)) : ?>
                            <?php foreach ($listTopdiscountFooter2 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Mới ra mắt</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        <?php $listTopnewFooter1 = getTopnewFooter1() ?>
                        <?php if (!empty($listTopnewFooter1)) : ?>
                            <?php foreach ($listTopnewFooter1 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php $listTopnewFooter2 = getTopnewFooter2() ?>
                        <?php if (!empty($listTopnewFooter2)) : ?>
                            <?php foreach ($listTopnewFooter2 as $product) : ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="view/assets/img/product/<?= $product['image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?= $product['category_name'] ?> | <?= $product['brand_name'] ?></p>
                                        <h3 class="product-name"><a href="index.php?act=singleProduct&id=<?= $product['id'] ?>"><?= mb_strimwidth($product['name'], 0, 30, "...") ?></a></h3>
                                        <h4 class="product-price">
                                            <?= $product['price_sale'] > 0 ? number_format($product['price_sale'], 0, ',', '.') : number_format($product['price'], 0, ',', '.') ?>
                                            <del class="product-old-price"><?= $product['price_sale'] > 0 ? number_format($product['price'], 0, ',', '.') : '' ?></del>
                                        </h4>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION TOP PRODUCT FOOTER -->