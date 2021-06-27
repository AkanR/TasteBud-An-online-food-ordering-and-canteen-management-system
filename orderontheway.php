<?php require_once 'configure.php';?>
<?php
if(isset($_GET['odre']))
{
    $prep='Order on the way';
    $send_message= query("update oldorders set order_status='$prep' where order_id=".escape($_GET['odre'])."");
    confirm($send_message);
    $send= query("update orders set order_status='$prep' where order_id=".escape($_GET['odre'])."");
    confirm($send);
    redirect("Vieworders.php");  
}
?>