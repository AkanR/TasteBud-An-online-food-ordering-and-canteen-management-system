<?php require_once 'configure.php';?>
<?php
if(isset($_GET['od']))
{
    $prep='Order Is Ready';
    $send_message= query("update oldorders set order_status='$prep' where order_id=".escape($_GET['od'])."");
    confirm($send_message);
    $send= query("update orders set order_status='$prep' where order_id=".escape($_GET['od'])."");
    confirm($send);
    redirect("Vieworders.php");  
}
?>