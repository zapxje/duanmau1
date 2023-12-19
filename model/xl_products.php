<?php
/*======================================== ADMIN ======================================== */
if (isset($_REQUEST['act']) && !empty($_REQUEST['act'])) {
    switch ($_REQUEST["act"]) {
        case 'filterProducts':
            //Trường hợp không truyên vào filter nào cả thì xử lí luôn
            if ($_REQUEST['idFilterCategory'] == 0 && $_REQUEST['idFilterBrand'] == 0) {
                $listProducts = getAllProducts();
                return;
            }
            //Trường hợp chỉ truyền vào filter category
            if ($_REQUEST['idFilterCategory'] != 0 && $_REQUEST['idFilterBrand'] == 0) {
                $id = $_REQUEST['idFilterCategory'];
                $listProducts = getProductByCategory($id);
            } else if ($_REQUEST['idFilterCategory'] == 0 && $_REQUEST['idFilterBrand'] != 0) {
                //Trường hợp chỉ truyền vào filter brand
                $id = $_REQUEST['idFilterBrand'];
                $listProducts = getProductByBrand($id);
            } else {
                //Trường hợp truyền vào cả hai filter
                $idCategory = $_REQUEST['idFilterCategory'];
                $idBrand = $_REQUEST['idFilterBrand'];
                $listProducts = getProductByBoth($idCategory, $idBrand);
            }
            break;

        case 'addProduct':
            if (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) {
                $idCategory = $_REQUEST['idCategory'];
                $idBrand = $_REQUEST['idBrand'];
                $name = $_REQUEST['name'];
                $price = $_REQUEST['price'];
                $price_sale = empty($_REQUEST['price_sale']) ? 'NULL' : $_REQUEST['price_sale'];
                $quantity = $_REQUEST['quantity'];
                $description = $_REQUEST['description'];
                //Lấy tên file
                $image = $_FILES['image']['name'];
                //Lấy định dạnh file
                $extension = pathinfo($image, PATHINFO_EXTENSION);
                //Kiểm tra định dạnh file ảnh
                if (!in_array($extension, ['png', 'jpg', 'jpeg', 'svg', 'gif'])) {
                    $notification = 'failedFormat';
                    return;
                }
                // Nếu định dạng ảnh đúng thì tạo đường dẫn lưu ảnh
                $dir = '../view/assets/img/product';
                //Tạo đường dẫn đầy đủ bao gồm tên ảnh
                $new_image_path = $dir . '/' . $image;
                // Nếu file ảnh tồn tại, thì thông báo 
                if (file_exists($new_image_path)) {
                    $notification = "alreadyExist";
                    return;
                }
                //Nếu chưa thì upload ảnh mới 
                move_uploaded_file($_FILES['image']['tmp_name'], $new_image_path);
                addProduct($idCategory, $idBrand, $name, $price, $price_sale, $quantity, $description, $image);
                //Lấy sản phẩm vừa thểm để get id
                $product = getProductByImage($image);
                //Kiểm tra có truyển ảnh con hay không
                if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                    $list_name = array();
                    $list_tmp_name = array();
                    foreach ($_FILES['images']['name'] as $image) {
                        $list_name[] = $image;
                    }
                    foreach ($_FILES['images']['tmp_name'] as $tmp_image) {
                        $list_tmp_name[] = $tmp_image;
                    }
                    for ($i = 0; $i < count($list_name); $i++) {
                        //Lấy định dạnh file
                        $extension = pathinfo($list_name[$i], PATHINFO_EXTENSION);
                        //Kiểm tra định dạnh file ảnh
                        if (!in_array($extension, ['png', 'jpg', 'jpeg', 'svg', 'gif'])) {
                            $notification = 'failedFormat';
                            return;
                        }
                        //Tạo đường dẫn đầy đủ bao gồm tên ảnh
                        $new_image_path = $dir . '/' . $list_name[$i];
                        // Nếu file ảnh tồn tại, thì thông báo 
                        if (file_exists($new_image_path)) {
                            $notification = "alreadyExist";
                            return;
                        }
                        //Nếu chưa thì upload ảnh mới 
                        move_uploaded_file($list_tmp_name[$i], $new_image_path);
                        //Gọi hàm thêm ảnh con
                        addImage($product['id'], $list_name[$i]);
                    }
                }
                $notification = 'successAdd';
            }
            break;

        case 'delProduct':
            if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $product = getOneProduct($id);
                if ($product) {
                    echo 'Ok';
                } else {
                    $notification = "notExist";
                }
            }
            break;

        case 'updateProduct':
            if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $product = getOneProduct($id);
                if ($product) {
                    if (isset($_REQUEST['update'])) {
                        $name = $_REQUEST['name'];
                        $price = $_REQUEST['price'];
                        $price_sale = $_REQUEST['price_sale'];
                        $quantity = $_REQUEST['quantity'];
                        $description = $_REQUEST['description'];
                        updateProduct($id, $name, $price, $price_sale, $quantity, $description);
                        $notification = 'successUpdate';
                        $listCategories = getAllCategories();
                        $listBrands = getAllBrands();
                        $listProducts = getAllProducts();
                        include_once("view/productsAd.php");
                        return;
                    }
                } else {
                    $notification = "notExist";
                }
            }
            break;

        case 'properties':
            if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $idProduct = $_REQUEST['id'];
                $product = getOneProduct($idProduct);
                if ($product) {
                    if (isset($_REQUEST['status'])) {
                        switch ($_REQUEST['status']) {
                            case '1':
                                if (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) {
                                    $name = $_REQUEST['name'];
                                    $description = $_REQUEST['description'];
                                    // if (validateNameProperty($name)) {
                                    //     $notification = 'nameExist';
                                    // } else {

                                        addProperty($idProduct, $name, $description);
                                        $notification = 'successAdd';
                                    // }
                                }
                                break;
                            case '2':
                                if (isset($_REQUEST['idProperty']) && !empty($_REQUEST['idProperty'])) {
                                    $idProperty = $_REQUEST['idProperty'];
                                    $property = getOneProperty($idProperty);
                                    if ($property) {
                                        delProperty($idProperty);
                                        $notification = "successDel";
                                    } else {
                                        $notification = "notExist";
                                    }
                                }
                                break;
                            case '3':
                                if (isset($_REQUEST['idProperty']) && !empty($_REQUEST['idProperty'])) {
                                    $idProperty = $_REQUEST['idProperty'];
                                    $property = getOneProperty($idProperty);
                                    if ($property) {
                                        include_once("view/propertiesUpAd.php");
                                        return;
                                    } else {
                                        $notification = "notExist";
                                    }
                                }
                                break;
                            case '4':
                                if (isset($_REQUEST['idProperty']) && !empty($_REQUEST['idProperty'])) {
                                    $idProperty = $_REQUEST['idProperty'];
                                    $property = getOneProperty($idProperty);
                                    if ($property) {
                                        if (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) {
                                            $name = $_REQUEST['name'];
                                            $description = $_REQUEST['description'];
                                            updateProperty($idProperty, $name, $description);
                                            $notification = 'successAdd';
                                        }
                                    } else {
                                        $notification = "notExist";
                                    }
                                }
                                break;
                        }
                    }
                    $listProperties = getPropertyByProduct($idProduct);
                    include_once("view/propertiesAd.php");
                } else {
                    $notification = "notExist";
                    $listCategories = getAllCategories();
                    $listBrands = getAllBrands();
                    $listProducts = getAllProducts();
                    include_once("view/productsAd.php");
                }
            }
            break;
            /*======================================== ADMIN END======================================== */
        case 'singleProduct':
            if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $idProduct = $_REQUEST['id'];
                $product = getOneProduct($idProduct);
                if ($product) {
                    $listImagesProduct = getImageByProduct($idProduct);
                    $listProperties = getPropertyByProduct($idProduct);
                    $listProductRelated = getProductByCategoryRelated($product['id_category'], $idProduct);
                    $listReviews = getReviewsByProduct($idProduct);
                    $setCartByIdProduct = getCartByIdProduct($idProduct);
                    if ($setCartByIdProduct) {
                        if (isset($_POST['submit-appraise'])) {
                            if (empty($_POST['rating'])) {
                                $messageRating = "Hãy chọn số sao bạn muốn !";
                            } else {
                                addReview(
                                    $_SESSION['user']['id'],
                                    $idProduct,
                                    $_POST['comment'],
                                    $_POST['rating']
                                );
                                header("location: index.php?act=singleProduct&id=" . $idProduct . "&reviewted");
                            }
                        }
                    }
                    include 'view/singleProduct.php';
                } else {
                    include 'view/home.php';
                }
            } else {
                include 'view/home.php';
            }
            break;
    }
}
