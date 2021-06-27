<?php require_once 'configure.php';?>
<?php
if(isset($_GET['advanceup']))
{
    $prep='Confirmed';
    $send_message= query("update advanceorders set order_status='$prep' where adorder_id=".escape($_GET['advanceup'])."");
    confirm($send_message);
    $sen_message= query("update oldadvanceorders set order_status='$prep' where adorder_id=".escape($_GET['advanceup'])."");
    confirm($sen_message);
    redirect("advanceorders.php");   
}
?>

