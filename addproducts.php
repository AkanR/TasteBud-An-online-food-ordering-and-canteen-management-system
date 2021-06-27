<?php require_once 'configure.php';?>
<?php
if(isset($_POST['publish_product']))
{
    
    $product_name = escape($_POST["product_name"]);
    $product_price = escape($_POST["product_price"]);
    $product_qty = escape($_POST["product_qty"]);
    $target_dir = "prodimg/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    //image directory
    move_uploaded_file($_FILES["product_image"]["tmp_name"],$target_file);
    $query= query("insert into old_product(product_name,product_price,product_qty,product_image) "
            . "values('$product_name','$product_price','$product_qty','$target_file')");
    confirm($query);
    set_message("The product <?php echo {$product_name} is successfuly added");
    redirect("Edit_products.php");
}


?>