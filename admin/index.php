<?php
session_start();

//include the model file
include_once("../model/connectDB.php");
include_once("../model/categories.php");
include_once("../model/brands.php");
include_once("../model/products.php");
include_once("../model/images.php");
include_once("../model/properties.php");
include_once("../model/users.php");
include_once("../model/orders.php");
include_once("../model/carts.php");
include_once("../model/xl_chart.php");

//include the header file
include_once("view/header.php");

if (isset($_REQUEST["act"]) && $_REQUEST['act'] == 'logout') {
    unset($_SESSION['user']);
}

//include the content file
if (isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']['is_admin'] == 0) {

    //include the sidebar file
    include_once("view/sidebar.php");

    if (isset($_REQUEST["act"])) {
        switch ($_REQUEST["act"]) {
            case 'categories':
                $listCategories = getAllCategories();
                include_once("view/categoriesAd.php");
                break;

            case 'addCategory':
                include_once("../model/xl_categories.php");
                $listCategories = getAllCategories();
                include_once("view/categoriesAd.php");
                break;

            case 'delCategory':
                include_once("../model/xl_categories.php");
                $listCategories = getAllCategories();
                include_once("view/categoriesAd.php");
                break;

            case 'updateCategory':
                include_once("../model/xl_categories.php");
                break;

            case 'brands':
                $listBrands = getAllBrands();
                include_once("view/brandsAd.php");
                break;

            case 'addBrand':
                include_once("../model/xl_brands.php");
                $listBrands = getAllBrands();
                include_once("view/brandsAd.php");
                break;

            case 'delBrand':
                include_once("../model/xl_brands.php");
                $listBrands = getAllBrands();
                include_once("view/brandsAd.php");
                break;

            case 'updateBrand':
                include_once("../model/xl_brands.php");
                break;

            case 'products':
                $listCategories = getAllCategories();
                $listBrands = getAllBrands();
                $listProducts = getAllProducts();
                include_once("view/productsAd.php");
                break;

            case 'filterProducts':
                include_once("../model/xl_products.php");
                $listCategories = getAllCategories();
                $listBrands = getAllBrands();
                include_once("view/productsAd.php");
                break;

            case 'addProduct':
                include_once("../model/xl_products.php");
                $listCategories = getAllCategories();
                $listBrands = getAllBrands();
                $listProducts = getAllProducts();
                include_once("view/productsAd.php");
                break;

            case 'delProduct':
                include_once("../model/xl_products.php");
                $listCategories = getAllCategories();
                $listBrands = getAllBrands();
                $listProducts = getAllProducts();
                include_once("view/productsAd.php");
                break;

            case 'updateProduct':
                include_once("../model/xl_products.php");
                
                include_once("view/productsUpAd.php");
                break;

            case 'imagesProduct':
                include_once("../model/xl_images.php");
                break;

            case 'properties':
                include_once("../model/xl_products.php");
                break;

            case 'ordersWait':
                include_once("../model/xl_orders.php");
                break;

            case 'ordersHandle':
                include_once("../model/xl_orders.php");
                break;

            case 'ordersDone':
                include_once("../model/xl_orders.php");
                break;

            default:
                include_once("view/main.php");
                break;
        }
    } else {
        include_once("view/main.php");
    }
} else {
    include_once("../model/xl_users.php");
    include_once("view/login.php");
}

//include the footer file
include_once("view/footer.php");
