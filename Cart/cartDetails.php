<?php
class CartDetails
{
    private $table_name;
    public $productId;
    public $userId;
    public $name;
    public $total;
    public $totalDiscount;
    public $totalWithDiscount;
    public $totalTax;
    public $totalWithTax;
    public $grandTotal;
    
    
    function addCart($name, $total, $totalDiscount, $totalWithDiscount, $totalTax, $totalWithTax, $grandTotal, $productId, $userId)
    {
        if($name!='' && $total!='' && $totalDiscount!='' && $totalWithDiscount!='' && $totalTax!='' && $totalWithTax!='' && $grandTotal!='' && $productId!='' && $userId!=''){
        $cartField = array(
            "user_id" => $userId,
            "product_id" => $productId,
            "name" => $name,
            "total" => $total,
            "total_discount" => $totalDiscount,
            "total_with_discount" => $totalWithDiscount,
            "total_tax" => $totalTax,
            "total_with_tax" => $totalWithTax,
            "grand_total" => $grandTotal,
            "created_date" => date('Y-m-d H:i:s')
        );
        $cartId = $GLOBALS['db']->insert_get_id($cartField, $GLOBALS['table']);
        if ($cartId != '') {
            $output['iserr']   = 1;
            $output['message'] = 'SuccessfullyCart Add';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        }else{
            $output['iserr']   = 0;
            if($name=='')
               $output['message']['Name'] = 'Invalid Entry Name';
            if($total=='')
               $output['message']['Total'] = 'Invalid Entry Total';
            if($totalDiscount=='')
               $output['message']['Discount'] = 'Invalid Entry Total Discount';
            if($totalWithDiscount=='')
               $output['message']['WithDiscount'] = 'Invalid Entry Total with Discount';
            if($totalTax=='')
               $output['message']['TotalTax'] = 'Invalid Entry Total Tax';
            if($totalWithTax=='')
               $output['message']['TotalWithTax'] = 'Invalid Entry Total with Tax';
            if($grandTotal=='')
               $output['message']['GrandTotal'] = 'Invalid Entry Grand Total';
            if($productId=='')
               $output['message']['ProductId'] = 'Invalid Entry Product Id ';
             if($userId=='')
               $output['message']['UserId'] = 'Invalid Entry User Id';
        }
        echo json_encode($output);
        exit();
    }
    
    function updateCart($name, $total, $totalDiscount, $totalWithDiscount, $totalTax, $totalWithTax, $grandTotal, $cartUpdateId)
    {
        $cartField = array(
            "name" => $name,
            "total" => $total,
            "total_discount" => $totalDiscount,
            "total_with_discount" => $totalWithDiscount,
            "total_tax" => $totalTax,
            "total_with_tax" => $totalWithTax,
            "grand_total" => $grandTotal,
            "created_date" => date('Y-m-d H:i:s')
        );
        $count     = $GLOBALS['db']->update($cartField, "id=" . $cartUpdateId, $GLOBALS['table']);
        if ($count > 0) {
            $output['iserr']   = 1;
            $output['message'] = 'SuccessfullyCart Update';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function deleteCart($cartDeleteId)
    {
        $count = $GLOBALS['db']->query("delete from  " . $GLOBALS['table'] . " where id='" . $cartDeleteId . "' ");
        if ($count > 0) {
            $output['iserr']   = 1;
            $output['message'] = 'SuccessfullyCart Delete';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function readCart($cartReadId)
    {
        $cartListAll = array();
        $count       = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . " where id='" . $cartReadId . "' order by  name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function listCarts()
    {
        $cartListAll = array();
        $count       = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . " order by name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll[] = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function showCarts($cartUserId)
    {
        $cartTable    = "carts";
        $productTable = "products";
        $cartListAll  = array();
        $count        = $GLOBALS['db']->query("select cart.*,product.name from  $cartTable as cart,$productTable product where cart.user_id='" . $cartUserId . "' and cart.product_id = product.id order by cart.name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll[] = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function getCartTotal($cartUserId)
    {
        $cartListAll = array();
        $count       = $GLOBALS['db']->query("select id,user_id,total from  " . $GLOBALS['table'] . "  where user_id='" . $cartUserId . "' order by name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll[] = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function getCartTotalDiscount($cartUserId)
    {
        $cartListAll = array();
        $count       = $GLOBALS['db']->query("select id,user_id,total_discount,total_with_discount from " . $GLOBALS['table'] . " where user_id='" . $cartUserId . "' order by name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll[] = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function getCartTotalTax($cartUserId)
    {
        $cartListAll = array();
        $count       = $GLOBALS['db']->query("select id,user_id,total_tax,total_with_tax from " . $GLOBALS['table'] . " where user_id='" . $cartUserId . "' order by name asc");
        while ($cartList = $GLOBALS['db']->getrec()) {
            $cartListAll[] = $cartList;
        }
        if ($count > 0) {
            $output['iserr']     = 1;
            $output['cart_list'] = $cartListAll;
            $output['message']   = 'SuccessfullyCart List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    function addUser($username, $firstName, $lastName, $dob, $mobile)
    {
        $userField = array(
            "username" => $username,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "dob" => $dob,
            "mobile_no" => $mobile,
            "role_id" => 2,
            "created_date" => date('Y-m-d H:i:s')
        );
        
        $userId = $GLOBALS['db']->insert_get_id($userField, $GLOBALS['table']);
        if ($userId != '') {
            $output['iserr']   = 1;
            $output['message'] = 'SuccessfullyCart Add';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
}
$cart = new CartDetails();
?>


 
