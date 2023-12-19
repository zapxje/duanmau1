<?php
/*======================================== ADMIN ======================================== */
if (isset($_REQUEST['act']) && !empty($_REQUEST['act'])) {
    switch ($_REQUEST['act']) {
        case 'ordersWait':
            if (isset($_REQUEST['idOrder']) && !empty($_REQUEST['idOrder'])) {
                $idOrder = $_REQUEST['idOrder'];
                $order = getOneOrder($idOrder);
                if ($order) {
                    if (isset($_REQUEST['orderDetailWait'])) {
                        $listCarts = getCartByOrder($idOrder);
                        include_once("view/orderDetailWaitAd.php");
                        return;
                    }
                    if (isset($_REQUEST['confirmOrder'])) {
                        confirmOrder($idOrder);
                        $notification = 'successAdd';
                    }
                } else {
                    $notification = 'notExist';
                }
            }
            $listOrders = getAllOrdersWait();
            include_once("view/ordersWait.php");
            break;
        case 'ordersHandle':
            // orderDetailHandle
            if (isset($_REQUEST['idOrder']) && !empty($_REQUEST['idOrder'])) {
                $idOrder = $_REQUEST['idOrder'];
                $order = getOneOrder($idOrder);
                if ($order) {
                    if (isset($_REQUEST['orderDetailHandle'])) {
                        $listCarts = getCartByOrder($idOrder);
                        include_once("view/orderDetailHandleAd.php");
                        return;
                    }
                    if (isset($_REQUEST['confirmOrderDone'])) {
                        confirmOrderDone($idOrder);
                        $notification = 'successAdd';
                    }
                } else {
                    $notification = 'notExist';
                }
            }
            $listOrders = getAllOrdersHandle();
            include_once("view/ordersHandle.php");
            break;
        case 'ordersDone':
            // orderDetailHandle
            if (isset($_REQUEST['idOrder']) && !empty($_REQUEST['idOrder'])) {
                $idOrder = $_REQUEST['idOrder'];
                $order = getOneOrder($idOrder);
                if ($order) {
                    if (isset($_REQUEST['orderDetailDone'])) {
                        $listCarts = getCartByOrder($idOrder);
                        include_once("view/orderDetailDoneAd.php");
                        return;
                    }
                } else {
                    $notification = 'notExist';
                }
            }
            $listOrders = getAllOrdersDone();
            include_once("view/ordersDone.php");
            break;
    }
}

/*======================================== /ADMIN ======================================= */
