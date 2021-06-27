<?php require_once 'configure.php';?>
<?php
if(isset($_GET['addcancel']))
{
    $query = query("delete from advanceorders where adorder_id=".escape($_GET['addcancel'])."");
    confirm($query);
    $del= query("delete from advance_reports where order_id=".escape($_GET['addcancel'])."");
    confirm($del);  
    $pre="Cancelled";
    $sen_message= query("update oldadvanceorders set order_status='$pre' where adorder_id=".escape($_GET['addcancel'])."");
    confirm($sen_message);
    $delivered='Order Cancelled';
    $delivermess="The order no.".escape($_GET['addelivered'])."&nbsp;is delivered successfully!";
    set_message("The Order is cancelled.");
    redirect("advanceorders.php");  
}
?>

