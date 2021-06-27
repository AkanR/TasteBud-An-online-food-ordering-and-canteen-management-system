<title>Thank you</title>
<?php require_once 'configure.php';?>
<?php require_once 'Cart.php'; ?>
<?php require_once 'header.php';?> 
<div class="container"> <br>
<center><p class="check_out">Thank You for ordering</p>
<?php
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$success = true;
$error = "Payment Failed";
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{ ?>
    <p class="check_out" style="color: red;">Your Payment is successful</p>
           <?php
           //insering into orders table
           $order_tr=$_SESSION['razorpay_order_id'];
           $cust_email=$_SESSION["email"];
           $cust_name=$_SESSION['Cname'];
           $cphone=$_SESSION['cno'];
           $total_amount=$_SESSION['item_total'];
           $order_stat= 'Confirm';
           $order_info=$_POST["roomno"];
           $result =  query("insert into orders (Cemail,Cust_name,C_phone_no,order_amount,order_transaction,order_status,order_info) values ('$cust_email','$cust_name','$cphone','$total_amount','$order_tr','$order_stat','$order_info')");
           confirm($result);
           $query = query("Select * from orders where order_transaction = '$order_tr'");
           confirm($query);
           while($row=  fetch_array($query)){
?>
<div class="row orderadmin">
<div class="col-lg-6 col-md-6 col-sm-4 col-xs-4"> 
<p class="thod"><b>Order no: </b> <?php echo $row['order_id']; $order_no=$row['order_id']; ?></p>      
<p><b>Total amount: Rs.</b><?php echo $row['order_amount']; ?></p>
<?php if($_SESSION['tuser'] == "teacher"){?>
<p><b>Room no. </b> <?php echo $row['order_info']; ?> </p>       
<?php
           }}
//inserting into old orders for user side display
$res =  query("insert into oldorders (order_id,Cemail,Cust_name,C_phone_no,order_amount,order_transaction,order_status,order_info) values ('$order_no','$cust_email','$cust_name','$cphone','$total_amount','$order_tr','$order_stat','$order_info')");
confirm($res);
reports($order_tr);
?>
</div>
<div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
        
<table class="table table-hover table-bordered" cellspacing="0">
                     <thead class="thead-dark">
                        <tr>
                            <th>Items</th>
                            <th>price </th>
                            <th>quantity</th>
                            
                        </tr>
                     </thead>
                     <tbody>
                         <?php
                         //fetching food items ordered
                         $query = query("Select * from reports where order_transaction = '$order_tr'");
                         confirm($query);
                         while($rowo=  fetch_array($query))
                         {
                         ?>
                         <tr>
                             <td>
                                 <?php 
                                echo $rowo['product_name'];
                                 ?>
                             </td>
                             <td>Rs.
                                 <?php 
                                echo $rowo['product_price'];
                                 
                                ?>
                             </td>
                              <td>
                                 <?php 
                                echo $rowo['product_qty'];
                                 ?>
                             </td>
                         </tr>
                         <?php } ?>
                        
                        </tbody>
       </table>
    
    </div>
    
</div>
<h5>Wait! you will be redirected to orders page within 3 seconds</h5>
<?php
header( "refresh:3;url=http://localhost/Tastebud/Recent%20Orders.php" );
}
else
{
    redirect("Sorry.php");
}

?>   
</center>
    <br>
    <br>
</div>
<?php require 'footer.php';?>