<?php require_once 'configure.php';?>
<?php
if(isset($_GET['delpro']))
{
    $query = query("delete from old_product where product_id=".escape($_GET['delpro'])."");
    confirm($query);  
    $que = query("delete from product where product_id=".escape($_GET['delpro'])."");
    confirm($que);
    set_message("Product Deleted Permanently");
    redirect("Edit_Products.php");  
}
?>