<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>  
<title>Admin Panel</title>
<br>
<div class="container">
    <center><p class="check_out">DASHBOARD</p>
        <a class="btn btn-primary btncol text" target="_self" href="adminboard.php">Refresh the page</a></center><br>
    <div class="row">
        <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <div class="flex-container"  id="vieworder" style=" display: flex; flex-direction: row; ">
             <div class="flexbg1"><i class="fas fa-concierge-bell fa-5x"></i></div>
             <div class="flexbg1 countorder"><center><?php countorders();?>
                 <p class="liveorder">No. of live orders</p>
                 <a href="Vieworders.php" class="btn btn-dark">View orders</a>
                 </center>
            </div>
            </div>
        </div>
        <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <div class="flex-container" id="vieworder1" style=" display: flex; flex-direction: row;">
                <div class="flexbg2"><i class="fas fa-shopping-bag fa-5x"></i></div>
             <div class="flexbg2 countorder"><center><?php countproducts();?>
                 <p class="liveorder">Today's Menu</p>
                 <a href="View Products.php" class="btn btn-dark">View products</a>
                 </center>
            </div>
            </div>
        </div>
    </div>
        <br><br>
    <div class="row">
        <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <div class="flex-container" id="vieworder2" style=" display: flex; flex-direction: row;">
                <div class="flexbg2"><br><i class="fas fa-receipt fa-4x"></i></div>
             <div class="flexbg2 countorder"><center><?php countallorders();?>
                 <p class="liveorder1">No. of Order Served</p>
                 <a href="Served Orders.php" class="btn btn-dark">View Served Orders</a>
                 </center>
            </div>
            </div>
        </div>
        <div class=" col-lg-6 col-md-6 col-sm-4 col-xs-4">
            <div class="flex-container" id="vieworder3" style=" display: flex; flex-direction: row;">
                <div class="flexbg2"><br><i class="fas fa-bookmark fa-4x"></i></div>
             <div class="flexbg2 countorder"><center><?php countalladvanceorders();?>
                 <p class="liveorder1">Advanced Orders</p>
                 <a href="advanceorders.php" class="btn btn-dark">View Advanced Orders</a>
                 </center>
            </div>
            </div>
        </div>
        <div class=" col-lg-3 col-md-6 col-sm-4 col-xs-4">
        </div>
    </div>
</div>
<br><br> 
<?php require 'footer.php';?>


