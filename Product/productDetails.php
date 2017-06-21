<?php
class ProductDetails
{
    private $table_name;
    public $name;
    public $description;
    public $price;
    public $discount;
    
    function addProduct($name, $description, $price, $discount, $categoryId)
    {
        if($name!='' && $description!='' && $price!='' && $discount!='' && $categoryId!=''){
        $productField = array(
            "category_id" => $categoryId,
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "discount" => $discount,
            "created_date" => date('Y-m-d H:i:s')
        );
        
        $productId = $GLOBALS['db']->insert_get_id($productField, $GLOBALS['table']);
        if ($productId != '') {
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Product Add';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        }else{
             $output['iserr']   = 0;
            if($name=='')
                $output['message'] = 'Invalid Entry Name';
            if($description=='')
                $output['message']. = 'Invalid Entry Description';
            if($price=='')
                $output['message']. = 'Invalid Entry Price';
            if($discount=='')
                $output['message']. = 'Invalid Entry Discount';
            if($categoryId=='')
                $output['message']. = 'Invalid Entry CategoryId';
            
         
        }
        echo json_encode($output);
        exit();
    }
    
    function updateProduct($name, $description, $price, $discount, $categoryId, $productUpdateId)
    {
        $productField = array(
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "discount" => $discount
        );
        
        $count = $GLOBALS['db']->update($productField, "id=" . $productUpdateId, $GLOBALS['table']);
        if ($count > 0) {
            
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Product Update';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function deleteProduct($productDeleteId)
    {
        $count = $GLOBALS['db']->query("delete from " . $GLOBALS['table'] . " where id='" . $productDeleteId . "' ");
        if ($count > 0) {
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Product Delete';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function readProduct($productReadId)
    {
        $productListAll = array();
        $count          = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . " where id='" . $productReadId . "' order by name asc");
        while ($productList = $GLOBALS['db']->getrec()) {
            $productListAll = $productList;
        }
        if ($count > 0) {
            $output['iserr']        = 1;
            $output['product_list'] = $productListAll;
            $output['message']      = 'Successfully Product List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function listProducts()
    {
        $productListAll = array();
        $count          = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . "  order by name asc");
        while ($productList = $GLOBALS['db']->getrec()) {
            $productListAll[] = $productList;
        }
        if ($count > 0) {
            $output['iserr']        = 1;
            $output['product_list'] = $productListAll;
            $output['message']      = 'Successfully Product List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
}
$product = new ProductDetails();
?>
