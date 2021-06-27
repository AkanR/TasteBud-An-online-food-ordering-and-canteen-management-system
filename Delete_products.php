<?php require_once 'configure.php';?>
<?php
if(isset($_GET['delo']))
{
    $query = query("delete from product where product_id=".escape($_GET['delo'])."");
    confirm($query);  
    set_message("The product is deleted customer will not able to buy it.");
    redirect("View Products.php");  
}
?>