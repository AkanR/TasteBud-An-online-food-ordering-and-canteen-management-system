<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>  
<title>Issue with an order</title>
<br>
<div class="container">
    <center><p class="check_out">Issue or Query</p></center>
    <div class="row">
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4"></div>
        <center>
        <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="Post">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Order No." name="orderno" required="true" pattern="[0-9]+">
                    <div class="input-group-append">
                        <button class="btn btn-success form-control" type="submit" name="search"><i class="fas fa-search fa-lg"></i></button>
                    </div>
                </div>
            </form>
        </div></center>
    </div>
</div>
<center>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $on_order = $_POST["orderno"];
    $issueii= query("select * from oldorders where order_id ='$on_order'");
    confirm($issueii);
    $rowissueii=  fetch_array($issueii);
if($rowissueii==0)
    {
     ?>
    <center><h2><b>*Record not found*</b></h2></center>
    <?php
    }
    
    else
    {
    ?>
    
    <br>
    <div class="container">
        <div class="row">
          <div class=" col-lg-3 col-md-6 col-sm-4 col-xs-4"></div>
             <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
                <div class="card">
                <div class="card-header" style="background-color: #700202">
                    <p class="liveorder" style="color: white;">The Details for order no. <?php echo $on_order; ?></p>
                </div>
                    <div class="card-body">
                     <?php
                     $issue= query("select * from oldorders where order_id ='$on_order'");
                     confirm($issue);
                     while ($rowissue=  fetch_array($issue))
                     {
                         $issueorder=<<<DELIMETER
                                      <p style="text-align: left; margin-left: 30px; "><b>Order No.: &nbsp;</b>{$rowissue['order_id']}</p>
                                      <p style="text-align: left; margin-left: 30px; "><b>Customer Name: &nbsp;</b>{$rowissue['Cust_name']}</p>
                                      <p style="text-align: left; margin-left: 30px; " ><b>Customer Email: &nbsp;</b>{$rowissue['Cemail']}</p>
                                      <p style="text-align: left; margin-left: 30px; "><b>Customer Phone no.: &nbsp;</b>{$rowissue['C_phone_no']}</p>
                                      <p style="text-align: left; margin-left: 30px; "><b>Order Amount: &nbsp; </b>{$rowissue['order_amount']}</p>
                                      <p style="text-align: left; margin-left: 30px; "><b>Order Transaction id: &nbsp; </b>{$rowissue['order_transaction']}</p>
                                      <p style="text-align: left; margin-left: 30px; "><b>Room No.: &nbsp; </b>{$rowissue['order_info']}</p>
                                      <p style=" text-align: left; margin-left: 30px; color: red;"><b>Order Status: &nbsp;</b>{$rowissue['order_status']}</p>
                           
DELIMETER;
               echo $issueorder;
               $issue_quant=  query("select * from old_reports where order_id = '$on_order'");
               confirm($issue_quant);
                             ?>          
      <table class="table table-hover table-bordered">
          <thead class="thead-dark">
                        <tr>
                            <th>Items</th>
                            <th>Quantity</th>
                        </tr>
                     </thead>
                     <tbody>
<?php
while($rowo=fetch_array($issue_quant))
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
    <?php
                     }
    ?>
                     
                    
                </div>  
             </div>  
        </div>  
    </div>
    </div>
    <?php
}    
}
?>  
</center>
<br>
<?php require 'footer.php';?>