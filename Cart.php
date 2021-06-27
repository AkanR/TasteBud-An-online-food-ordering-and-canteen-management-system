
<?php require_once 'configure.php';?>
<?php
if(isset($_GET['add']))
{
    $query=query("SELECT * FROM product where product_id=". escape($_GET['add'])."");
    confirm($query);
    while($row=  fetch_array($query)){
        if($row['product_qty'] != $_SESSION['product_'.$_GET['add']])
        {
            $_SESSION['product_'.$_GET['add']]+=1;
            header("Location:Checkout.php");
            
        }
        else{
            $message = "oops We are out of those!";
            set_message("<script type='text/javascript'>alert('$message');</script>");
            header("Location:Checkout.php");
        }
    }
    
    
}

if(isset($_GET['remove']))
{
   $_SESSION['product_'.$_GET['remove']]-=1;
   if($_SESSION['product_'.$_GET['remove']]<1)
   {
       unset($_SESSION['item_total']);
       unset($_SESSION['item_qty']);
       redirect("Checkout.php");
   }
   else
   {   unset($_SESSION['item_total']);
    unset($_SESSION['item_qty']);
       redirect("Checkout.php"); 
   }
}


if(isset($_GET['delete'])) 
{
    $_SESSION['product_'.$_GET['delete']]='0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_qty']);
   redirect("Checkout.php"); 
}


function cart()
{
    $total=0;
    $qty=0;
    $item_name=1;
    $item_no=1;
    $item_qty=1;
    $amount=1;
    foreach ($_SESSION as $name => $value) {
        if($value>0)
            {
               if(substr($name, 0,8) == "product_")
                 {
                   $length = strlen($name)-8;
                   $id = substr($name,8,$length);
                   $query=query("SELECT * FROM product where product_id=".escape($id)." ");
                   confirm($query);
                   while($row = fetch_array($query))
                    {
                         $sub=$row['product_price'] * $value;
                         $qty += $value;
                         $product_check= <<<DELIMETER
                          <tr>
                          <td>{$row['product_name']}</td>
                          <td>Rs.{$row['product_price']}</td>
                          <td>{$value}</td>
                          <td>Rs.{$sub}</td>
                          <td><a class="btn btn-warning" href="Cart.php?remove={$row['product_id']}"><b>-</b></a> 
                              &nbsp; <a class="btn btn-success" href="Cart.php?add={$row['product_id']}"><b>+</b></a>
                              &nbsp; <a class="btn btn-danger" href="Cart.php?delete={$row['product_id']}"><b>x</b></a></td>
                          </tr> 
                          <input type="hidden" name="item_name_{$item_name}" value="{$row['product_name']}">
                          <input type="hidden" name="item_no_{$item_no}" value="{$row['product_id']}">
                          <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                          <input type="hidden" name="Item_qty_{$item_qty}" value="{$value}">
DELIMETER;
                   echo $product_check;
                   $item_name++;
                   $item_no++;
                   $amount++;
                   $item_qty++;
                    } 
                   $_SESSION['item_total'] = $total += $sub; 
                   $_SESSION['item_qty'] = $qty;
                 }
                 
         }
        
    }
     
     
     
}


function reports($order_tr)
{
    $order = query("Select * from orders where order_transaction = '$order_tr'");
    confirm($order);
    $rowo=  fetch_array($order);
    $order_id=$rowo['order_id'];
    $total=0;
    $qty=0;
    foreach ($_SESSION as $name => $value) {
        if($value>0)
            {
               if(substr($name, 0,8) == "product_")
                 {
                   $length = strlen($name)-8;
                   $id = substr($name,8,$length);
                   $query=query("SELECT * FROM product where product_id=".escape($id)." ");
                   confirm($query);
                   while($row = fetch_array($query))
                    {
                         $product_name=$row['product_name'];
                         $product_price=$row['product_price'];
                         $sub=$row['product_price'] * $value;
                         $qty += $value;
                         $insert_report=  query("insert into reports (order_id,order_transaction,product_id,product_name,product_price,Product_qty) 
                             values ('{$order_id}','{$order_tr}','{$id}','{$product_name}','{$product_price}','{$value}')");
                         confirm($insert_report);
                         $insert=  query("insert into old_reports (order_id,order_transaction,product_id,product_name,product_price,Product_qty) 
                             values ('{$order_id}','{$order_tr}','{$id}','{$product_name}','{$product_price}','{$value}')");
                         confirm($insert);
                    } 
                   $total += $sub; 
                 }
                 
         }
        
    }

}
     
     

?>

