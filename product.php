<?php
$incpath = dirname(__FILE__) . '/Product/';
require_once($incpath . 'productDetails.php');
require_once('authentication.php');
require_once('db.php');
$authenticate = new Authentication();
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

$method      = ($_POST) ? $_POST : $_GET;
$productType = $method['type'];
$userRole    = $authenticate->authenticate($_POST['username']);
$admin       = 1;
if ($userRole == $admin) {
    switch ($productType) {
        case "addProduct":
            $product->addProduct($method['name'], $method['description'], $method['price'], $method['discount'], $method['category_id']);
            break;
        case "updateProduct":
            $product->updateProduct($method['name'], $method['description'], $method['price'], $method['discount'], $method['category_id'], $method['productUpdateId']);
            break;
        case "deleteProduct":
            $product->deleteProduct($method['productDeleteId']);
            break;
        case "readProduct":
            $product->readProduct($method['productReadId']);
            break;
        case "listProducts":
            $product->listProducts();
            break;
    }
} else {
    $output['iserr']   = 0;
    $output['message'] = 'Invalid User';
    echo json_encode($output);
    
}


?>
