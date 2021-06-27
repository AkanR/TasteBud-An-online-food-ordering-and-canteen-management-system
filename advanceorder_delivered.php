<?php require_once 'configure.php';?>
<?php
if(isset($_GET['addelivered']))
{
    $query = query("delete from advanceorders where adorder_id=".escape($_GET['addelivered'])."");
    confirm($query);
    $del= query("delete from advance_reports where order_id=".escape($_GET['addelivered'])."");
    confirm($del);  
    $pre="Delivered";
    $sen_message= query("update oldadvanceorders set order_status='$pre' where adorder_id=".escape($_GET['addelivered'])."");
    confirm($sen_message);
    $delivered='Order Delivered';
    $delivermess="The order no.".escape($_GET['addelivered'])."&nbsp;is delivered successfully!";
    set_message($delivermess);
    redirect("advanceorders.php");  
}
?>

