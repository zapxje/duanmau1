<?php
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['phone']) || empty($_REQUEST['address']) || empty($_REQUEST['city']) || empty($_REQUEST['payment']) || empty($_REQUEST['agree'])) {
        switch (true) {
            case empty($_REQUEST['name']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập tên người nhận
                        </div>';
                break;
            case empty($_REQUEST['email']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập email
                        </div>';
                break;
            case empty($_REQUEST['phone']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập số điện thoại
                        </div>';
                break;
            case empty($_REQUEST['address']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập địa chỉ
                        </div>';
                break;
            case empty($_REQUEST['city']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập thành phố
                        </div>';
                break;
            case empty($_REQUEST['payment']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy nhập chọn phương thức thanh toán
                        </div>';
                break;
            case empty($_REQUEST['agree']):
                $message = '<div class="alert alert-danger" role="alert">
                            Hãy chắc chắn bạn đã rõ điều khoản và điều kiện
                        </div>';
                break;
        }
        return;
    }

    // Tạo SESSTION Chứa Tạm Order //
    $permitted_chars = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $orderTemp = array(
        'id_user' => $_POST['id_user'],
        'code_order' => substr(str_shuffle($permitted_chars), 0, 10),
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'city' => $_POST['city'],
        'phone' => $_POST['phone'],
        'note' => $_POST['note'],
        'payment_method' => $_POST['payment'],
        'total_order' => $_POST['total-order']
    );
    $_SESSION['orderTemp'] = $orderTemp;

    // Tạo SESSTION Chứa Tạm Carts //
    $listCarts = array();
    if (isset($_REQUEST['products'])) {
        foreach ($_REQUEST['products'] as $product) {
            $cartTemp = array(
                'id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            );
            $listCarts[] = $cartTemp;
        }
    } else {
        include 'view/home.php';
        return;
    }
    $_SESSION['cartsTemp'] = $listCarts;


    //------------------------Xử lí các trường hợp thanh toán--------------------//
    $redirectUrlBase = "http://localhost/pro1014/index.php?act=redirectCheckout";
    if (isset($_REQUEST['payment'])) {
        if ($_REQUEST['payment'] == 'MOMOATM') {
            header('Content-type: text/html; charset=utf-8');
            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                //execute post
                $result = curl_exec($ch);
                //close connection
                curl_close($ch);
                return $result;
            }
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo ATM";
            $amount = "10000";
            $orderId = time() . "";
            $redirectUrl = $redirectUrlBase;
            $ipnUrl = $redirectUrlBase;
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true); // decode json
            //Just a example, please check more in there
            header('Location: ' . $jsonResult['payUrl']);
            //----------------------------------------------------------------//
        } else if ($_REQUEST['payment'] == 'MOMOQRCode') {
            header('Content-type: text/html; charset=utf-8');
            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                //execute post
                $result = curl_exec($ch);
                //close connection
                curl_close($ch);
                return $result;
            }
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $_SESSION['orderTemp']['total_order'];
            $orderId = time() . "";
            $redirectUrl = $redirectUrlBase;
            $ipnUrl = $redirectUrlBase;
            $extraData = "";
            $requestId = time() . "";
            $requestType = "captureWallet";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true); // decode json
            //Just a example, please check more in there
            header('Location: ' . $jsonResult['payUrl']);
            //----------------------------------------------------------------//
        } else if ($_REQUEST['payment'] == 'VNPAY') {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = $redirectUrlBase;
            $vnp_TmnCode = "CGXZLS0Z"; //Mã website tại VNPAY 
            $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật

            $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Nội dung thanh toán";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = 10000 * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //127.0.0.1
            //Add Params of 2.0.1 Version
            // $vnp_ExpireDate = $_POST['txtexpire'];
            //Billing
            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            // $vnp_Bill_Email = $_POST['txt_billing_email'];
            // $fullName = trim($_POST['txt_billing_fullname']);
            // if (isset($fullName) && trim($fullName) != '') {
            //     $name = explode(' ', $fullName);
            //     $vnp_Bill_FirstName = array_shift($name);
            //     $vnp_Bill_LastName = array_pop($name);
            // }
            // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            // $vnp_Bill_City = $_POST['txt_bill_city'];
            // $vnp_Bill_Country = $_POST['txt_bill_country'];
            // $vnp_Bill_State = $_POST['txt_bill_state'];
            // // Invoice
            // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            // $vnp_Inv_Email = $_POST['txt_inv_email'];
            // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            // $vnp_Inv_Company = $_POST['txt_inv_company'];
            // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            // $vnp_Inv_Type = $_POST['cbo_inv_type'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
                // "vnp_ExpireDate" => $vnp_ExpireDate,
                // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                // "vnp_Bill_Email" => $vnp_Bill_Email,
                // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                // "vnp_Bill_Address" => $vnp_Bill_Address,
                // "vnp_Bill_City" => $vnp_Bill_City,
                // "vnp_Bill_Country" => $vnp_Bill_Country,
                // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                // "vnp_Inv_Email" => $vnp_Inv_Email,
                // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                // "vnp_Inv_Address" => $vnp_Inv_Address,
                // "vnp_Inv_Company" => $vnp_Inv_Company,
                // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                // "vnp_Inv_Type" => $vnp_Inv_Type
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            // }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['payment'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            //----------------------------------------------------------------//
        } else {
            //Nếu thanh toán khi nhận hàng thì done luôn//
            addOrder(
                $_SESSION['orderTemp']['id_user'],
                $_SESSION['orderTemp']['code_order'],
                $_SESSION['orderTemp']['name'],
                $_SESSION['orderTemp']['email'],
                $_SESSION['orderTemp']['address'],
                $_SESSION['orderTemp']['city'],
                $_SESSION['orderTemp']['phone'],
                $_SESSION['orderTemp']['note'],
                $_SESSION['orderTemp']['payment_method'],
                $_SESSION['orderTemp']['total_order'],
            );
            unset($_SESSION['orderTemp']);
            $newOrder = getOneOrderLimit();
            foreach ($_SESSION['cartsTemp'] as $cart) {
                addCart($cart['id'], $newOrder['id'], $cart['price'], $cart['quantity']);
            }
            unset($_SESSION['cartsTemp']);
            header("location: index.php?act=thankyou");
        }
    }
}
