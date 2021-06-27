<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>  
<title>Advance Orders</title>
<div class="container">
    <center>
    <p class="check_out">Your Advance orders</p>
    <a class="btn btn-primary btncol text" target="_self" href="advanceorders.php">Refresh the page</a>
    <br><br>
    <?php
    display_message();
    advanceorders(); ?>
    </center>
    
</div>
<?php require 'footer.php';?>

