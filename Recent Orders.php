<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Recent orders</title>
<div class="container">
    <center><p class="check_out">Your orders</p>   
        <a class="btn btn-primary btncol text" target="_self" href="Recent Orders.php">Refresh the page</a></center>
        <br><br>
      <?php 
      usersession();
      recentorders();
      if($_SESSION['tuser']!='student')
      {
      ?>
    <center><p class="check">Your Advance orders</p></center>   
    
    <?php
      
    advanceordersreport();
      }
      
      ?>   
     
    
                     
           
</div>

<?php require 'footer.php';?>

