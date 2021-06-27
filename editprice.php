<?php require_once 'configure.php';?>
<?php
if(isset($_POST["Editprice"]))
{
    $quantity=$_POST["productprice"];
    $proid=$_POST["proid"];
    $edit= query("UPDATE old_product SET product_price ='$quantity' where product_id='$proid'");
    confirm($edit);
    $editpro= query("UPDATE product SET product_price ='$quantity' where product_id='$proid'");
    confirm($editpro);
    set_message("The price of the product is updated");
    redirect("Edit_products.php");
}
?>

