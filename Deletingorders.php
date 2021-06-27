<?php require_once 'configure.php';?>
<?php
if(isset($_GET['pd']))
{
    $query = query("delete from orders where order_id=".escape($_GET['pd'])."");
    confirm($query);
    $del= query("delete from reports where order_id=".escape($_GET['pd'])."");
    confirm($del);   
    $delivered='Order Delivered';
    $send_message= query("update oldorders set order_status='$delivered' where order_id=".escape($_GET['pd'])."");
    confirm($send_message);
    $delivermess="The order no.".escape($_GET['pd'])."is delivered successfully!";
    set_message($delivermess);
    redirect("Vieworders.php");  
}
?>