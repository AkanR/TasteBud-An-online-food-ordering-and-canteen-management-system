<?php require_once 'configure.php';?>
<?php 
if(isset($_POST['order_advance']))
{
    usersession();
    $aemail=$_SESSION['email'];
    $aphone=$_SESSION['cno'];
    $aname=$_SESSION['Cname'];
    $adate=$_POST["event_date"];
    $atime=$_POST["event_time"];
    $aeventname=$_POST["event_name"];
    $aroom=$_POST["event_room"];
    $order_status="Order placed";
     $orderinfo=$_POST['event_info'];   
    $advancerder= query("insert into advanceorders(cust_name,cust_email,cust_phone_no,order_date,order_time,event_name,event_room,order_specific_info,order_status)"
            . "values('$aname','$aemail','$aphone','$adate','$atime','$aeventname','$aroom','$orderinfo','$order_status')");
    confirm($advancerder);
    $advanceorder= query("insert into oldadvanceorders(cust_name,cust_email,cust_phone_no,order_date,order_time,event_name,event_room,order_specific_info,order_status)"
            . "values('$aname','$aemail','$aphone','$adate','$atime','$aeventname','$aroom','$orderinfo','$order_status')");
    confirm($advanceorder);
    $advancereport= query("select * from advanceorders where cust_email='$aemail' AND order_date='$adate'");
    confirm($advancereport);
    $adrow= fetch_array($advancereport);
    $orderid=$adrow['adorder_id'];
    foreach ($_POST["myitems"] as $key => $value)
    {
      $insertadvance= query("insert into advance_reports(order_id,product_name,product_qty) "
              . "values('$orderid','{$_POST["myitems"][$key]}','{$_POST["myqty"][$key]}')");
      confirm($insertadvance);
      $insertoadvance= query("insert into oldadvance_reports(order_id,product_name,product_qty) "
              . "values('$orderid','{$_POST["myitems"][$key]}','{$_POST["myqty"][$key]}')");
      confirm($insertoadvance);
    }
    redirect("advanceorder_complete.php");
}

    
    
?>

