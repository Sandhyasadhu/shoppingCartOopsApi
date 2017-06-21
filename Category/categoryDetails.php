<?php
class CategoryDetails
{
    public $name;
    public $description;
    public $tax;
    function addCategory($name, $description, $tax)
    {
        $categoryField = array(
            "name" => $name,
            "description" => $description,
            "tax" => $tax,
            "created_date" => date('Y-m-d H:i:s')
        );
        $categoryId    = $GLOBALS['db']->insert_get_id($categoryField, $GLOBALS['table']);
        if ($categoryId != '') {
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Category Add';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function updateCategory($name, $description, $tax, $categoryUpdateId)
    {
        $categoryField = array(
            "name" => $name,
            "description" => $description,
            "tax" => $tax
        );
        $count         = $GLOBALS['db']->update($categoryField, "id=" . $categoryUpdateId, $GLOBALS['table']);
        if ($count > 0) {
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Category Update';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function deleteCategory($categoryDeleteId)
    {
         $count = $GLOBALS['db']->query("delete  from " . $GLOBALS['table'] . " where id='" . $categoryDeleteId . "'  ");
        if ($count > 0) {
            $output['iserr']   = 1;
            $output['message'] = 'Successfully Category Delete';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function readCategory($categoryReadId)
    {
        
        $categoryListAll = array();
        $count           = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . " where id='" . $categoryReadId . "' order by  name asc");
        while ($categoryList = $GLOBALS['db']->getrec()) {
            $categoryListAll = $categoryList;
        }
        if ($count == true) {
            $output['iserr']         = 1;
            $output['category_list'] = $categoryListAll;
            $output['message']       = 'Successfully Category Read';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
    
    function listCategories()
    {
        $categoryListAll = array();
        $count           = $GLOBALS['db']->query("select * from " . $GLOBALS['table'] . "  order by  name asc");
        while ($categoryList = $GLOBALS['db']->getrec()) {
            $categoryListAll[] = $categoryList;
        }
        if ($count > 0) {
            $output['iserr']         = 1;
            $output['category_list'] = $categoryListAll;
            $output['message']       = 'Successfully Category List';
        } else {
            $output['iserr']   = 0;
            $output['message'] = 'Invalid Entry';
        }
        echo json_encode($output);
        exit();
    }
}
$category = new CategoryDetails();
?>
