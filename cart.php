<?php
$incpath = dirname(__FILE__) . '/Cart/';
require_once($incpath . 'cartDetails.php');
require_once('authentication.php');
require_once('db.php');
//$authenticate = new Authentication();
$fileName     = basename(__FILE__, ".php");
$fileName     = $fileName;
$fileNameLast = substr($fileName, -1);
if ($fileNameLast == 'y') {
    $tableName        = rtrim($fileName, "y");
    $tableName        = $tableName . "ies";
    $GLOBALS['table'] = $tableName;
} else {
    $tableName        = $fileName . "s";
    $GLOBALS['table'] = $tableName;
}

$method   = ($_POST) ? $_POST : $_GET;
$cartType = $method['type'];

$userRole = $GLOBALS['authenticate']->authenticate($_POST['username']);
if (($userRole == 1) || ($userRole == 2)) {
    switch ($cartType) {
        case "addCart":
            $cart->addCart($method['name'], $method['total'], $method['total_discount'], $method['total_with_discount'], $method['total_tax'], $method['total_with_tax'], $method['grand_total'], $method['product_id'], $method['user_id']);
            break;
        case "updateCart":
            $cart->updateCart($method['name'], $method['total'], $method['total_discount'], $method['total_with_discount'], $method['total_tax'], $method['total_with_tax'], $method['grand_total'], $method['cartUpdateId']);
            break;
        case "deleteCart":
            $cart->deleteCart($method['cartDeleteId']);
            break;
        case "readCart":
            $cart->readCart($method['cartReadId']);
            break;
        case "listCarts":
            $cart->listCarts();
            break;
        case "showCarts":
            $cart->showCarts($method['user_id']);
            break;
        case "getCartTotal":
            $cart->getCartTotal($method['user_id']);
            break;
        case "getCartTotalDiscount":
            $cart->getCartTotalDiscount($method['user_id']);
            break;
        case "getCartTotalTax":
            $cart->getCartTotalTax($method['user_id']);
            break;
        case "addUser":
            $cart->addUser($method['username_add'], $method['first_name'], $method['last_name'], $method['dob'], $method['mobile']);
            break;
    }
} else {
    $output['iserr']   = 0;
    $output['message'] = 'Invalid User';
    echo json_encode($output);
    
}


?>
