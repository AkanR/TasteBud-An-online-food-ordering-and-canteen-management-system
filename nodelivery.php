<?php require_once 'configure.php';?>
<?php
if(isset($_GET['odnod']))
{
    $prep='Delivery person not available';
    $send_message= query("update oldorders set order_status='$prep' where order_id=".escape($_GET['odnod'])."");
    confirm($send_message);
    $send= query("update orders set order_status='$prep' where order_id=".escape($_GET['odnod'])."");
    confirm($send);
    redirect("Vieworders.php");  
}
?>
