<?php require_once 'configure.php'; ?>
<!-- checking session -->
<?php
if(isset($_SESSION["email"])) {
             header("Location:Product.php");
              }
 elseif(isset($_SESSION["name"]))
 {
 header("Location:adminboard.php");
 
 }
?>
<!-- checking session  ending-->
<!-- home page -->
<!DOCTYPE html>
<html>
    <head>
<title>TasteBud - Order food at a click</title>
    </head>
    <body class="parallax display2bg"> 
       <?php require 'header.php';?>
        <div class="container-fluid">
        <div class="row">
             <div class=" col-lg-12 col-md-12 col-sm-4 col-xs-4">
             <p class="foodie">We are here to Complete The Story of Foodie and Food</p>
             </div>                
        </div>
        <div class="row">
            <div class=" col-lg-12 col-md-12 col-sm-4 col-xs-4">
                <p class="distext3">Order Whenever, Eat Whatever</p><br>
                <center><a class="btn btn-danger" href="Userlogin.php"><b>Login Now</b></a></center>
            <br><br>
            </div>                
        </div>
            <br><br><br><br><br>
        </div>
    </body>
    <?php require 'footer.php';?>
</html>
<!-- end -->
