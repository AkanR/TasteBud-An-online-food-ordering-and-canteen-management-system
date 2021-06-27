<?php require_once 'configure.php';?>
<?php
if(isset($_POST["Edit"]))
{
    $quantity=$_POST["quantity"];
    $proid=$_POST["proid"];
    $edit= query("UPDATE old_product SET product_qty ='$quantity' where product_id='$proid'");
    confirm($edit);
    $editpro= query("UPDATE product SET product_qty ='$quantity' where product_id='$proid'");
    confirm($editpro);
    set_message("The quantity of the product is updated");
    redirect("Edit_products.php");
    
}
?>

