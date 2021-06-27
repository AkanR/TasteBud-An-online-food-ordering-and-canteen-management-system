
<?php
function redirect($location){
    header("location:$location");
}

function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";


    }
}
function display_message() {

if(isset($_SESSION['message'])) {
      $mess=<<<DELIMETER
        <br><br>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{$_SESSION['message']}</strong>
        </div>
DELIMETER;
echo $mess;     
unset($_SESSION['message']);
}}

function query($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}

function confirm($result){
    global $conn;
    if(!$result){
        die("Query failed".mysqli_errno($conn));
    }
}
 function fetch_array($send_query){
     return mysqli_fetch_array($send_query);
 }

function escape($string)
 {
     
      global $conn;
     return mysqli_real_escape_string($conn,$string);
 }
 
 function usersession()
 {
     $query=  query("select * from login where email='{$_SESSION['email']}'");
     confirm($query);
     $row = fetch_array($query);
     $_SESSION['Cname']=$row['name'];
     $_SESSION['tuser']=$row['type'];
     $_SESSION['cno']=$row['contactno'];
     $_SESSION['dept']=$row['department'];
     $_SESSION['year']=$row['year'];
     
 }
  function get_products(){
     
    $query=query("SELECT * FROM product");
     confirm($query);
     while($row = fetch_array($query))
     {
         $product= <<<DELIMETER
                 
           <div class="col-xs-8 col-sm-3 col-md-4 col-lg-3">
                    <div class="prodbox"><center>
                        <img class="prodimg" src="{$row['product_image']}" alt="{$row['product_name']}">
                        <div>
                            <p class="text1">{$row['product_name']}</p>
                            <p class="text">Rs.{$row['product_price']}</p>
                            <a class="btn text1  btn-info" id="btn-info" target="_self" href="Cart.php?add={$row['product_id']}">Add to Cart</a>
                        </div></center>
                    </div>
                        
                </div> <br>    
                 
DELIMETER;
          echo $product;
     }
     
 }
?>
<?php 
//function for products on checkout page

function cartproductshow()
{
$query=query("SELECT * FROM product");
     confirm($query);
     while($row = fetch_array($query))
     {
         $product= <<<DELIMETER
                 
           <div class="col-xs-8 col-sm-3 col-md-4 col-lg-2">
                    <div class="prodbox"><center>
                        <div>
                            <p class="text1">{$row['product_name']}</p>
                            <p class="text">Rs.{$row['product_price']}</p>
                            <a class="btn text1 btn-info" id="btn-info" target="_self" href="Cart.php?add={$row['product_id']}">Add to Cart</a>
                        </div></center>
                    </div>
                        
                </div> <br>    
                 
DELIMETER;
          echo $product;
     }
     
 }





?>

<?php
//printing recent orders
function recentorders(){
    
    $query=  query("select * from oldorders where Cemail='{$_SESSION['email']}' ORDER BY order_date DESC ");
    confirm($query);
    while ($row=  fetch_array($query))
    {
        $recentorders=<<<DELIMETER
        <div class="row orderadmin">
        <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
        <p><b>Order No.: &nbsp;</b>{$row['order_id']}</p>
        <p><b>Customer Name: &nbsp;</b>{$row['Cust_name']}</p>
        <p><b>Customer Phone no.: &nbsp;</b>{$row['C_phone_no']}</p>
    </div>
   <div class="col-lg-3 col-md-6 col-sm-4 col-xs-4">
   <p><b>Order Amount: &nbsp; </b>{$row['order_amount']}</p>
   <p><b>Room No.: &nbsp; </b>{$row['order_info']}</p>
   <p style="color: red;"><b>Order Status: &nbsp;</b>{$row['order_status']}</p>
   </div>                           
DELIMETER;
                echo $recentorders;
                $o_id=$row['order_id'];
    
  $order_quant=  query("select * from old_reports where order_id = '$o_id'");
  confirm($order_quant); ?>
<div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 ">
<p><b>Order Date: &nbsp;</b><?php $timestamp = strtotime($row['order_date']); $date_order = date('d-m-Y', $timestamp);  echo $date_order;?></p>
<p><b>Order Time: &nbsp;</b><?php $date_time = date('H:i', $timestamp);  echo $date_time;?></p>
</div>
<div class="col-lg-3 col-md-6 col-sm-4 col-xs-4 ">
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
</div><br><?php
    }}
?>
<?php
function advanceordersreport()
{
  $queryadvance= query("select * from oldadvanceorders where cust_email='{$_SESSION['email']}'");
  confirm($queryadvance);  
  while($radvance= fetch_array($queryadvance))
  {
?>
            <div class="row orderadmin">
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <p><b>Order no: </b> <?php echo $radvance['adorder_id'];?></p>
            <p><b>Event Name: </b> <?php echo $radvance['event_name'];?></p>
            <p><b>Date: </b> <?php echo $radvance['order_date'];?></p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <p><b>Time: </b> <?php echo $radvance['order_time'];?></p>
            <p><b>Room: </b> <?php echo $radvance['event_room'];?></p>
            <p style="color: red;"><b>Order Status: </b><?php echo $radvance['order_status'];?></p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
                <table class="table table-hover table-bordered" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Items</th>
                            <th>quantity</th>
                            
                        </tr>
                     </thead>
                     <tbody>
            <?php
        $rqueryadvance= query("select * from oldadvance_reports where order_id='{$radvance['adorder_id']}'");
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
        </div>
<br>
<?php
  }
}
?>

