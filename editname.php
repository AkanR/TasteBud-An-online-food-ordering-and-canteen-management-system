
<?php require_once 'configure.php';?>
<?php
if(isset($_POST["Editname"]))
{
    $quantity=$_POST["productname"];
    $proid=$_POST["proid"];
    $edit= query("UPDATE old_product SET product_name ='$quantity' where product_id='$proid'");
    confirm($edit);
    $editpro= query("UPDATE product SET product_name ='$quantity' where product_id='$proid'");
    confirm($editpro);
    set_message("The name of the product is updated");
    redirect("Edit_products.php");
}
?>

