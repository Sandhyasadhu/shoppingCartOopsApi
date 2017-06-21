<?php
$incpath = dirname(__FILE__) . '/Category/';
require_once($incpath . 'categoryDetails.php');
require_once('authentication.php');
require_once('db.php');
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
$method       = ($_POST) ? $_POST : $_GET;
$categoryType = $method['type'];
$userRole     = $authenticate->authenticate($method['username']);
$admin        = 1;
if ($userRole == $admin) {
    switch ($categoryType) {
        case "addCategory":
            $category->addCategory($method['name'], $method['description'], $method['tax']);
            break;
        case "updateCategory":
            $category->updateCategory($method['name'], $method['description'], $method['tax'], $method['categoryUpdateId']);
            break;
        case "deleteCategory":
            $category->deleteCategory($method['categoryDeleteId']);
            break;
        case "readCategory":
            $category->readCategory($method['categoryReadId']);
            break;
        case "listCategories":
            $category->listCategories();
            break;
    }
    
} else {
    $output['iserr']   = 0;
    $output['message'] = 'Invalid User';
    echo json_encode($output);
    
}


?>
