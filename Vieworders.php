<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>  
<title>Live Orders</title>
<br>
<div class="container">
    <center><p class="check_out">Live Orders</p>
        <?php display_message(); ?>
           <a class="btn btn-primary btncol text" href="Vieworders.php">Refresh the page to update</a> <br> <br>  
    </center>
 <?php reportorders(); ?>
</div>
<?php require 'footer.php';?>
