<?php
function getChartByMonth($month)
{
    $conn = connectdb();
    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT COUNT(*) AS total_orders, COALESCE(SUM(total_order), 0) AS total_prices
            FROM orders WHERE MONTH(created_at) = :month AND payment_status = 2";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    // Thực hiện truy vấn
    $stmt->execute();
    // Lấy kết quả
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Đóng kết nối và trả về kết quả
    $conn = null;
    return $result;
}
