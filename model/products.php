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
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY p.id desc";
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

function addProduct($idCategory, $idBrand, $name, $price, $price_sale, $quantity, $description, $image)
{
    $sql = "INSERT INTO products(id_category, id_brand, name, price, price_sale, quantity, description, image) 
    VALUES(" . $idCategory . ", " . $idBrand . " , '" . $name . "'," . $price . ", " . $price_sale . ", " . $quantity . ", '" . $description . "', '" . $image . "')";
    return querySql($sql);
}

function updateProduct($idProduct, $name, $price, $price_sale, $quantity, $description)
{
    $sql = "UPDATE products 
            SET name = '$name', 
                price = $price, 
                price_sale = $price_sale, 
                quantity = $quantity, 
                description = '$description'
            WHERE id = $idProduct";
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
        BETWEEN (SELECT COALESCE(price_sale, price)*0.8 FROM products WHERE id = $idProduct) 
        AND (SELECT COALESCE(price_sale, price)*1.2 FROM products WHERE id = $idProduct))
        OR 
        (p.price_sale IS NULL AND p.price 
        BETWEEN (SELECT COALESCE(price_sale, price)*0.8 FROM products WHERE id = $idProduct) 
        AND (SELECT COALESCE(price_sale, price)*1.2 FROM products WHERE id = $idProduct))
        )
    AND p.id <> $idProduct LIMIT 4";
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

function getProductByPaging($limit, $offset, $price_from = null, $price_to = null)
{
    $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ";
    // Áp dụng điều kiện giá nếu được truyền vào
    if ($price_from !== null && $price_to !== null) {
        $sql .= "WHERE p.price BETWEEN $price_from AND $price_to ";
    }
    // Thêm LIMIT và OFFSET vào câu truy vấn
    $sql .= "LIMIT $limit OFFSET $offset";
    return getAll($sql);
}
function getTotalProductByFilterPrice($price_from, $price_to)
{
    $sql = "SELECT * FROM  products WHERE (price BETWEEN $price_from AND $price_to)
    OR (price_sale BETWEEN $price_from AND $price_to)";
    return getAll($sql);
}
// ============================== Hàm lấy sản phẩm theo checkbox filter ============================== //
// function getListProductById($idCategory, $idBrand)
// {
//     $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name FROM products AS p 
//     LEFT JOIN categories AS ca ON ca.id = p.id_category 
//     LEFT JOIN brands AS br ON br.id = p.id_brand 
//     WHERE id_category IN ($idCategory) OR id_brand IN ($idBrand)";
//     return getAll($sql);
// }
function getProductByCategoryFilter($idCategory, $limit, $offset, $price_from = null, $price_to = null)
{
    $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE p.id_category IN ($idCategory) ";
    // Áp dụng điều kiện giá nếu được truyền vào
    if ($price_from !== null && $price_to !== null) {
        $sql .= "AND p.price BETWEEN $price_from AND $price_to ";
    }
    // Thêm LIMIT và OFFSET vào câu truy vấn
    $sql .= "LIMIT $limit OFFSET $offset";
    return getAll($sql);
}
function getTotalProductByCategoryFilter($idCategory)
{
    $sql = "SELECT * FROM products
    WHERE id_category IN ($idCategory)";
    return getAll($sql);
}
function getProductByBrandFilter($idBrand, $limit, $offset)
{
    $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE id_brand IN ($idBrand)
    LIMIT $limit OFFSET $offset";
    return getAll($sql);
}
function getTotalProductByBrandFilter($idBrand)
{
    $sql = "SELECT * FROM products
    WHERE id_brand IN ($idBrand)";
    return getAll($sql);
}
function getProductByBothFilter($idCategory, $idBrand, $limit, $offset)
{
    $sql = "SELECT p.*, ca.name AS category_name, br.name AS brand_name FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE id_category IN ($idCategory) AND id_brand IN ($idBrand)
    LIMIT $limit OFFSET $offset";
    return getAll($sql);
}
function getTotalProductByBothFilter($idCategory, $idBrand)
{
    $sql = "SELECT * FROM products
    WHERE id_category IN ($idCategory) AND id_brand IN ($idBrand)";
    return getAll($sql);
}
// ============================== Hàm lấy sản phẩm theo checkbox filter ============================== //

function getProductBySearch($keyWord, $limit, $offset)
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    WHERE p.name LIKE '%$keyWord%' 
    LIMIT $limit OFFSET $offset";
    return getAll($sql);
}
function getTotalProductBySearch($keyWord)
{
    $sql = "SELECT * FROM products
    WHERE name LIKE '%$keyWord%'";
    return getAll($sql);
}
// ======================= Lấy Sản Phẩm Footer(Bán chạy, Topsel, New) ===================== //
function getTopsellingFooter1()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY number_of_purchases DESC
    LIMIT 3 OFFSET 0";
    return getAll($sql);
}
function getTopsellingFooter2()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY number_of_purchases DESC
    LIMIT 3 OFFSET 3";
    return getAll($sql);
}
function getTopdiscountFooter1()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name
    , ((p.price - p.price_sale) / p.price) * 100 AS discount_percentage
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand
    ORDER BY discount_percentage DESC
    LIMIT 3 OFFSET 0";
    return getAll($sql);
}
function getTopdiscountFooter2()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name
    , ((p.price - p.price_sale) / p.price) * 100 AS discount_percentage
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand
    ORDER BY discount_percentage DESC
    LIMIT 3 OFFSET 3";
    return getAll($sql);
}
function getTopnewFooter1()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY id DESC
    LIMIT 3 OFFSET 0";
    return getAll($sql);
}
function getTopnewFooter2()
{
    $sql = "SELECT p.* , ca.name AS category_name, br.name AS brand_name 
    FROM products AS p 
    LEFT JOIN categories AS ca ON ca.id = p.id_category 
    LEFT JOIN brands AS br ON br.id = p.id_brand 
    ORDER BY id DESC
    LIMIT 3 OFFSET 3";
    return getAll($sql);
}
