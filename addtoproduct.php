<?php require_once 'configure.php';?>
<?php
if(isset($_GET['addin']))
{
    
    $query=query("SELECT * FROM product where product_id=". escape($_GET['addin'])."");
    confirm($query);
    while($row= fetch_array($query))
    {
        $ido=$row['product_id'];
        if($row['product_id']==$_GET['addin'])
        {
            set_message("Sorry! we cannot this product it is already visible to the customers");
            redirect("Edit_products.php");
            
        }
    }
    if($ido!=$_GET['addin'])
    {
          $quer=query("SELECT * FROM old_product where product_id=". escape($_GET['addin'])."");
          confirm($quer); 
          while($rowi= fetch_array($quer))
          {
            $productid=$rowi['product_id'];
            $proname=$rowi['product_name'];
            $proqty=$rowi['product_qty'];
            $proprice=$rowi['product_price'];
            $proimage=$rowi['product_image'];
            $insert= query("insert into product (product_id,product_name,product_qty,product_price,product_image)"
                    . "values('$productid','$proname','$proqty','$proprice','$proimage')");   
            confirm($insert);
            set_message("Success! the product is now visible to the customers they can buy it now.");
            redirect("Edit_products.php");
          } 
    }
    
}
?>