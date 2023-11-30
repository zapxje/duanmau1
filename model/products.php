<?php
function getProductByImage($image)
{
    $sql = "SELECT * FROM products WHERE image = '" . $image . "'";
    return getOne($sql);
}
function getProductByCategory($id)
{
    $sql = "SELECT * FROM products WHERE id_category = " . $id;
    return getAll($sql);
}
function getProductByBrand($id)
{
    $sql = "SELECT * FROM products WHERE id_brand = " . $id;
    return getAll($sql);
}
//Lấy sản phẩm theo id category và id brand
function getProductByBoth($idCategory, $idBrand)
{
    $sql = "SELECT * FROM products WHERE id_category = " . $idCategory . " AND id_brand =" . $idBrand;
    return getAll($sql);
}
function getAllProducts()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand ";
    return getAll($sql);
}
function getOneProduct($id)
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE p.id=" . $id;
    return getOne($sql);
}
function getListProdductById($idCategory){
    $sql= "SELECT p.*, ca.name AS category_name, br.name AS brand_name FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE id_category IN ($idCategory)";
     return getAll($sql);
}

function addProduct($idCategory, $idBrand, $name, $price, $price_sale, $quantity, $description, $image)
{
    $sql = "INSERT INTO products(id_category, id_brand, name, price, price_sale, quantity, description, image) 
    VALUES(" . $idCategory . ", " . $idBrand . " , '" . $name . "'," . $price . ", " . $price_sale . ", " . $quantity . ", '" . $description . "', '" . $image . "')";
    return querySql($sql);
}
//Lấy 5 sản phẩm theo danh mục (sản phẩm mới)
function getProductByCategoryNew($id)
{
    // $sql = "SELECT * FROM products WHERE id_category=" . $id . " ORDER BY id desc LIMIT 5";
    $sql = "SELECT p.*, ca.name as category_name, br.name as brand_name 
    FROM products as p 
    LEFT JOIN categories as ca ON ca.id = p.id_category 
    LEFT JOIN brands as br ON br.id = p.id_brand
    WHERE ca.id = " . $id . "
    ORDER BY p.id desc LIMIT 5";
    return getAll($sql);
}
//Lấy 5 sản phẩm theo danh mục (sản phẩm bán chạy)
function getProductByCategoryTopselling($id)
{
    $sql = "SELECT p.*, ca.name as category_name, br.name as brand_name 
    FROM products as p 
    LEFT JOIN categories as ca ON ca.id = p.id_category 
    LEFT JOIN brands as br ON br.id = p.id_brand
    WHERE ca.id = " . $id . "
    ORDER BY p.number_of_purchases desc LIMIT 5";
    return getAll($sql);
}
//Lấy 5 sản phẩm trong tầm giá theo danh mục (sản phẩm liên quan)
function getProductByCategoryRelated($idCategory, $idProduct)
{
    $sql = "SELECT p.*, ca.name as category_name, br.name as brand_name 
    FROM products as p 
    LEFT JOIN categories as ca ON ca.id = p.id_category 
    LEFT JOIN brands as br ON br.id = p.id_brand 
    WHERE ca.id = " . $idCategory . " 
    AND (
        (p.price_sale IS NOT NULL AND p.price_sale 
        BETWEEN (SELECT COALESCE(price_sale, price)*0.8 FROM products WHERE id = " . $idProduct . ") 
        AND (SELECT COALESCE(price_sale, price)*1.2 FROM products WHERE id = " . $idProduct . "))
        OR 
        (p.price_sale IS NULL AND p.price 
        BETWEEN (SELECT COALESCE(price_sale, price)*0.8 FROM products WHERE id = " . $idProduct . ") 
        AND (SELECT COALESCE(price_sale, price)*1.2 FROM products WHERE id = " . $idProduct . "))
        )
    AND p.id <> " . $idProduct;
    return getAll($sql);
}
//Lấy 3 sản phẩm trong tổng (sản phẩm bán chạy)
function getProductTopselling()
{
    $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY p.number_of_purchases desc LIMIT 3";
    return getAll($sql);
}
function isSale($product)
{
    if ($product['price_sale'] > 0 && round(($product['price'] - $product['price_sale']) / $product['price'] * 100) > 5) {
        return 1;
    } else {
        return -1;
    }
}

function isNew($idCategory, $product)
{
    $listProductByCategoryNew = getProductByCategoryNew($idCategory);
    if (in_array($product, $listProductByCategoryNew)) {
        return 1;
    } else {
        return -1;
    }
}
