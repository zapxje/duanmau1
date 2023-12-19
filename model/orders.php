<?php

function getAllOrdersWait()
{
	$sql = "SELECT * FROM orders WHERE payment_status = 0 ORDER BY id desc";
	return getAll($sql);
}

function getAllOrdersHandle()
{
	$sql = "SELECT * FROM orders WHERE payment_status = 1 ORDER BY id desc";
	return getAll($sql);
}
function getAllOrdersDone()
{
	$sql = "SELECT * FROM orders WHERE payment_status = 2 ORDER BY id desc";
	return getAll($sql);
}

function addOrder($id_user, $code_order, $name, $email, $address, $city, $phone, $note, $payment_method, $total_order)
{
	$sql = "INSERT INTO orders(id_user, code_order, name, email, address, city, phone, note, payment_method, total_order)
	VALUES('$id_user', '$code_order', '$name', '$email', '$address', '$city', '$phone', '$note',  
          '$payment_method', $total_order)";
	return querySql($sql);
}
function getOneOrder($idOrder)
{
	$sql = "SELECT * FROM orders WHERE id = $idOrder";
	return getOne($sql);
}
function getOrderByUser($idUser)
{
	$sql = "SELECT * FROM orders WHERE id_user = $idUser AND payment_status >= 0 ORDER BY payment_status asc";
	return getAll($sql);
}
function getOneOrderLimit()
{
	$sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1;";
	return getOne($sql);
}

function addCart($id_product, $id_order, $price, $quantity)
{
	// Chọn một giá trị từ mảng $id_order (ví dụ: lấy giá trị đầu tiên)
	$selected_order_id = is_array($id_order) ? reset($id_order) : $id_order;

	$sql = "INSERT INTO carts(id_product, id_order, price, quantity)
            VALUES($id_product, $selected_order_id, $price, $quantity)";
	return querySql($sql);
}
function getCartByIdProduct($idProduct)
{
	$sql = "SELECT c.*, od.id_user as order_idUser
			FROM carts as c
			LEFT JOIN orders as od ON c.id_order = od.id
			WHERE c.id_product = $idProduct";
	return getAll($sql);
}
function getCartByUser($idUser)
{
	$sql = "SELECT c.*, us.id as id_user
	FROM carts as c
	LEFT JOIN orders as od ON c.id_order = od.id
	LEFT JOIN users as us on us.id = od.id_user
	WHERE us.id = $idUser AND od.payment_status = 2";
	return getAll($sql);
}
function cancelOrder($idOrder, $reason)
{
	$sql = "UPDATE orders
    SET payment_status = -1, note = '" . $reason . "'
    WHERE id =" . $idOrder;
	return querySql($sql);
}
//Xác nhận từ Admin
function confirmOrder($idOrder)
{
	$sql = "UPDATE orders
    SET payment_status = 1
    WHERE id =" . $idOrder;
	return querySql($sql);
}
//Xác nhận từ cả hai (Admin hoặc User)
function confirmOrderDone($idOrder)
{
	$sql = "UPDATE orders
	SET payment_status = 2
	WHERE id = $idOrder;
	-- Cập nhật số lượng bán hàng trong bảng products
	UPDATE products
	SET number_of_purchases = number_of_purchases + 1
	WHERE id IN (
	SELECT id_product
	FROM carts
	WHERE id_order = $idOrder)";
	return querySql($sql);
}
