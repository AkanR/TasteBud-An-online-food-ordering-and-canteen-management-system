<?php
function countorders()
{
    $count=0;
  $query=  query("select * from orders");
    confirm($query);
    while ($row=  fetch_array($query))
    {  
        $count++;
    }
    echo $count;
}
?>
<?php
function countalladvanceorders()
{
    $count3=0;
     $query=  query("select * from advanceorders");
    confirm($query);
    while ($row=  fetch_array($query))
    {  
        $count3++;
    }
    echo $count3;
}
?>
<?php
function countallorders()
{
     $count2=0;
     $date=date("Y-m-d");
     $mess="Order Delivered";
  $query=  query("select * from oldorders where order_status='{$mess}' AND date(order_date)='$date'");
    confirm($query);
    while ($row=  fetch_array($query))
    {  
        $count2++;
    }
    echo $count2;   
}
?>
<?php

function countproducts()
{
  $count1=0;
  $query=  query("select * from product");
    confirm($query);
    while ($row=  fetch_array($query))
    {  
        $count1++;
    }
    echo $count1;
}
?>
<?php
function served_orders()
{
   $mess="Order Delivered";
   $date=date("Y-m-d");
   $query=  query("select * from oldorders where order_status='{$mess}' AND date(order_date)='{$date}' order by order_date desc");
   confirm($query);
   ?>
         <table class="table table-sm  table-hover table-bordered table-responsive-sm" border="1" id="mytable"  cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                            <th>Order No</th>
                            <th>Name</th>
                            <th>Contact No</th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Item Details</th>  
                        </tr>
                     </thead>
                     <tbody>
                         <?php
   while ($row=  fetch_array($query))
   { ?>
<tr>
            <td><p class="text"><?php echo $row['order_id']; ?></p></td>
            <td><p class="text"><?php echo $row['Cust_name'];?></p></td>  
            <td><p class="text"><?php echo $row['C_phone_no'];?></p></td>
            <td><p class="text">Rs.<?php echo $row['order_amount'];?></p></td>
            <td><p class="text"><?php echo $row['order_date'] ?></p></td>
            <td><p class="text">
            <?php
                $quereport=  query("select * from old_reports where order_id='{$row['order_id']}' AND date(order_date)='$date'");
                confirm($quereport);
                ?>
                    <table class="table table-bordered" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item name</th>
                            <th>Qty</th> 
                        </tr>
                     </thead>
                     <tbody> 
                   <?php
                while ($rowreport=  fetch_array($quereport))
                  {
                  ?>
                         <tr>
                        <td><p class="text"><?php echo $rowreport['product_name'];?></p></td>
                        <td><p class="text"><?php echo $rowreport['product_qty']; ?></p></td> 
                         </tr>
                  <?php
                  }
                  ?>
                     </tbody>
            </table>
                </p></td></tr>
<?php
   } ?>
                     </tbody>
            </table>
<?php  
}
?>
<?php
function totalearning()
{
 $mess="Order Delivered";
 $date=date("Y-m-d");
 $query=  query("select sum(order_amount) from oldorders where order_status='{$mess}' AND date(order_date)='{$date}'");
 confirm($query); 
 while ($row=  fetch_array($query))
 {
     $total=$row['sum(order_amount)'];
 }
 echo $total;
$deleteordersinterval= query("delete from oldorders where order_date < DATE_ADD(NOW(),interval -30 DAY)");
confirm($deleteordersinterval);
$deleteorder= query("delete from old_reports where order_date < DATE_ADD(NOW(),interval -30 DAY)");
confirm($deleteorder);
}
?>

<?php
function reportorders(){

    $query=  query("select * from orders ORDER by order_date DESC");
    confirm($query);
    while ($row=  fetch_array($query))
    {
        
        $orders=<<<DELIMETER
        <div class="row orderadmin">      
        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
        <p><b>Order No.: &nbsp;</b>{$row['order_id']}</p>
        <p><b>Name: &nbsp;</b>{$row['Cust_name']}</p>
        <p><b>Phone no.: &nbsp;</b>{$row['C_phone_no']}</p>
    </div>
   <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
   <p><b>Amount: &nbsp;</b>{$row['order_amount']}</p>
   <p><b>Room No: &nbsp;</b>{$row['order_info']}</p>
   <p style="color: red;"><b>Status: &nbsp;</b>{$row['order_status']}</p>
   </div>               
DELIMETER;
                echo $orders;
                $o_id=$row['order_id'];
    
$order_quant=  query("select * from reports where order_id = '$o_id'");
  confirm($order_quant);
  
        ?>          
<div class="col-lg-2 col-md-6 col-sm-4 col-xs-4 ">
      <table class="table table-hover table-bordered">
          <thead class="thead-dark">
                        <tr>
                            <th>Items</th>
                            <th>Quantity</th>
                        </tr>
                     </thead>
                     <tbody>
<?php
while($rowo=fetch_array($order_quant))
   {
?>
                    <tr>
                    <td><?php echo $rowo['product_name'];?></td>
                     <td><?php echo $rowo['product_qty'];?></td>
                 </tr>
 
                     
<?php
}
?>
 </tbody>
</table>   
</div>
<div class="col-lg-4 col-md-6 col-sm-4 col-xs-4 ">
<?php 
if( $row['order_info']!= "N/A")
{
    $usertype=<<<DELIMETER
            <a class="btn btn-warning"><i class="fas fa-id-card"></i>&nbsp;<b>Staff Order</b></a><br><br>
            <a class="btn btn-warning" href="nodelivery.php?odnod={$row['order_id']}"><i class="fas fa-exclamation-circle"></i>&nbsp;<b>No Delivery Person available</b></a><br><br>
            <a class="btn btn-info" href="orderontheway.php?odre={$row['order_id']}"><i class="fas fa-paper-plane"></i>&nbsp;On Way</a>
DELIMETER;
}
 else
{
 $usertype="";   
}
$click=<<<DELIMETER
{$usertype}
<a class="btn btn-success" href="orders_ready.php?od={$row['order_id']}"><i class="fas fa-bell"></i> Ready</a>
<a class="btn btn-danger" href="Deletingorders.php?pd={$row['order_id']}"><i class="fas fa-thumbs-up"></i> Delivered</a>   
DELIMETER;
echo $click;
?>
</div>
</div><br>
<?php
}}
?>

<?php
function admin_viewproducts()
{
      $query=query("SELECT * FROM product");
     confirm($query);
     while($row = fetch_array($query))
     {
         $product= <<<DELIMETER
                 
           <tr>
            <td><p class="text">{$row['product_name']}</p></td>
            <td><p class="text">Rs.{$row['product_price']}</p></td>  
            <td><p class="text">{$row['product_qty']}</p></td>
            <td>
               <a class="btn text1  btn-danger" target="_self" href="Delete_products.php?delo={$row['product_id']}">x</a>
                       
                        
                    
                 
DELIMETER;
          echo $product;
     }
}

?>

<?php
//edit products
function editproducts()
{
    $query= query("Select * from old_products");
    confirm($query);
    
    $edit=<<<DELIMETER

DELIMETER;
echo $edit;
}
?>

<?php
//edit products

function edit_products()
{
    $query= query("Select * from old_product");
    confirm($query);
    while($row= fetch_array($query))
    {
         $editprod=<<<DELIMETER
        <div class="row orderadmin">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 ">
         <br>
         <img class="prodimg" src="{$row['product_image']}" alt="{$row['product_name']}">
         </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 ">
         <br>
        <p><b>Product Name: </b><br>{$row['product_name']}</p>
        <p><b>Product Quantity: </b>Rs.{$row['product_price']}</p>
        <p><b>Product Quantity: </b><br>{$row['product_qty']}</p>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 ">
        <form  method="post" action="editname.php">
        Enter the Name: 
        <input type="text" name="productname" required="true">
        <input type="hidden" name="proid" value="{$row['product_id']}">
        <br><br>
        <input class="btn btn-info" id="btn-info" type="submit" name="Editname" value="Edit Name">
        </form>
        <form  method="post" action="editprice.php" required="true">
        Enter the Price: 
        <input type="text" name="productprice" pattern="[0-9]{1,3}">
        <input type="hidden" name="proid" value="{$row['product_id']}">
        <br><br>
        <input class="btn btn-info" id="btn-info" type="submit" name="Editprice" value="Edit Price">
        </form>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 ">
        <form  method="post" action="editquantity.php">
        Enter the Quantity: 
        <input type="text" name="quantity" pattern="[0-9]{1,3}">
        <input type="hidden" name="proid" value="{$row['product_id']}">
        <br><br>
        <input class="btn btn-info" id="btn-info" type="submit" name="Edit" value="Edit Quantity">
        </form>
        <br>
        <a class="btn btn-dark" href="addtoproduct.php?addin={$row['product_id']}">
        <i class="fas fa-plus"></i>&nbsp; Add to Products</a>
        <br><br>
        <a class="btn text1  btn-danger" href="productdelete.php?delpro={$row['product_id']}">Delete</a>
        </div>
        </div>
        <br>
DELIMETER;
        echo $editprod;
    }
    
}
?>
<?php
function advanceorders()
{
 $queryadvance= query("select * from advanceorders");
  confirm($queryadvance);  
  while($radvance= fetch_array($queryadvance))
  {
?>
            <div class="row orderadmin">
            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
            <p><b>Order no: &nbsp;</b> <?php echo $radvance['adorder_id'];?></p>
            <p><b>Event Name: &nbsp;</b> <?php echo $radvance['event_name'];?></p>
            <p><b>Name: &nbsp;</b> <?php echo $radvance['cust_name'];?></p>
            <p><b>Phone no: &nbsp;</b> <?php echo $radvance['cust_phone_no'];?></p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
            <p><b>Date: &nbsp;</b> <?php echo $radvance['order_date'];?></p>
            <p><b>Time: &nbsp;</b> <?php echo $radvance['order_time'];?></p>
            <p><b>Room No: &nbsp;</b> <?php echo $radvance['event_room'];?></p>
            <p style="color: red;"><b>Order Status: &nbsp;</b> <?php echo $radvance['order_status'];?></p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
                <table class="table table-hover table-bordered" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Items</th>
                            <th>quantity</th>
                            
                        </tr>
                     </thead>
                     <tbody>
            <?php
        $rqueryadvance= query("select * from advance_reports where order_id='{$radvance['adorder_id']}'");
        confirm($rqueryadvance);
        while($readvance= fetch_array($rqueryadvance))
        {
        ?>
         <tr>
            <td><?php echo $readvance['product_name'];?></td>
            <td><?php echo $readvance['product_qty'];?></td>
         </tr>
        <?php
        }?>
                  </tbody>
            </table>
            </div>
                <?php
                $edit=<<<DELIMETER
                    <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
                    <br>
                <a class="btn btn-info" href="advanceorder_update.php?advanceup={$radvance['adorder_id']}"><i class="fas fa-bell"></i>&nbsp;Confirm</a>
                <br><br>
                <a class="btn btn-success" href="advanceorder_delivered.php?addelivered={$radvance['adorder_id']}"><i class="fas fa-thumbs-up"></i>&nbsp;Delivered</a>
                <a class="btn btn-danger" href="advanceorder_cancel.php?addcancel={$radvance['adorder_id']}"><i class="fas fa-thumbs-down"></i>&nbsp;Cancel</a>   
                </div>
DELIMETER;
echo $edit;
                ?>

        </div>
<br>
<?php
  }   
}
?>

