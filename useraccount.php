<!-- user account info-->
<?php require_once 'configure.php';?>
<?php require_once 'header.php';?> 

     <title>My Account</title>
     <div class="parallax" id="bgbg">
     <div class="container" >
      <br>
     
    <div class="row">
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">Welcome <?php usersession(); echo $_SESSION['Cname']; ?>!</p>
                </div>
                <div class="card-body">
                    <?php
                     usersession();
                    ?>
                    <p style="text-align: left; margin-left: 30px; "><b>Name:</b> <?php echo $_SESSION['Cname']; ?></p>
                    <p style="text-align: left; margin-left: 30px; "><b>Email:</b> <?php echo $_SESSION['email']; ?></p>
                    <p style="text-align: left; margin-left: 30px; "><b>Contact No.:</b> <?php echo $_SESSION['cno']; ?></p>
                    <p style="text-align: left; margin-left: 30px; "><b>Department:</b> <?php echo $_SESSION['dept']; ?></p>
                    <p style="text-align: left; margin-left: 30px; "><b>Year:</b> <?php echo $_SESSION['year']; ?></p>
                </div>
                 <div class="card-footer" id="phead"><b>Thank You for using TasteBud!</b></div>
             </div>
            </center>
        </div>
    </div>
     </div><br>
         </div>
     
<?php require 'footer.php';?>