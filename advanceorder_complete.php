<title>Advance Order Placed</title>
<?php require_once 'configure.php';?>
<?php require_once 'header.php';?> 
<div class="container"> <br>
    <center>
        <p class="check_out">Thank you!</p>
        <p class="check_out" style="color: red;">Your Advanced Order is placed successfully.</p>
        <br>
        <h5>Wait! you will be redirected to orders page within 2 seconds</h5>
        <?php header( "refresh:2;url=http://localhost/Tastebud/Recent%20Orders.php");?>
    </center>   
</div>