<?php require_once 'configure.php';?>
<?php require_once 'Cart.php'; ?>
<?php require_once 'header.php';?> 
<title>Checkout</title>
<?php display_message();
usersession();
?>
<div class="container">
    <center><p class="check_out">CHECKOUT</p></center>
            <center><form action="Thankyou.php" method="POST">
       <table class="table table-hover table-bordered table-responsive-sm" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub-total</th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php cart(); ?>
                        </tbody>
       </table>
                    <h3>Order Total= <?php echo $_SESSION['item_total'];?></h3>
  
<?php 
 isset($_SESSION['item_qty']) ? $_SESSION['item_qty'] : $_SESSION['item_qty'] ="0";
 isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] ="0";
?>

<?php 
usersession(); 
if($_SESSION['tuser'] == "teacher")
    {?>
       <br>
      <div>
          <label><h6>Enter the Room No. where You want it to be delivered:</h6></label>
          <center><input type="text" class="form-control" placeholder="Enter Room no. and Floor" name="roomno"  required="true" style="border-color: black"></center>
      </div>  
<?php 
    }
else 
      {?>  
<input type="hidden" name="roomno" value="N/A">
<?php } ?> <br>
<?php 
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);

$orderData = [
    'amount'          => $_SESSION['item_total']*100,
    'currency'        => 'INR',
    'payment_capture' => 1
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];
?>
    <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId;?>"
    data-amount="<?php echo $displayAmount; ?>"
    data-description=" <?php echo $_SESSION['Cname'];?> "
    data-currency="<?php echo $displayCurrency;?>"
    data-buttontext="Pay Now"
    data-name="<?php echo $merchant_name;?>"
    data-image="<?php echo $merchant_logo?>"
    data-prefill.name="<?php echo $_SESSION['Cname']?>"
    data-prefill.email="<?php echo $_SESSION["email"]?>"
    data-prefill.contact="<?php echo $_SESSION['cno']?>"
    data-notes.roomno="<?php echo $_POST["roomno"]?>"
    data-theme.color="#700202"
    data-order_id="<?php echo $_SESSION['razorpay_order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $_SESSION['item_total'];?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $_SESSION['item_total'];?>"<?php } ?> >
  </script>
           </form>

                

    
                <p class="text2">Want to add some more <i class="fas fa-arrow-circle-down fa-lg"></i></p>
     <div class="row">
                <?php cartproductshow(); ?>
                
            </div> 
    </center>
    </div>

        <?php require 'footer.php';?> 