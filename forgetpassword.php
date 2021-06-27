<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Forget Password</title>

<script>
            function myFunction() {
            var x = document.getElementById("admininput");
                    if (x.type === "APassword") {
            x.type = "text";
            } else {
            x.type = "APassword";
            }
            }

</script>
<body class="bgadmin">
<div class="container">
    <?php display_message(); ?>
    <div class="row"><br><br>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4"><br>
            <div class="card">
                <center>
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">forget Password</p>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="Post">
                            <div class="form-group">
                               <input type="text" class="form-control" name="FEmail" placeholder="Email" required="true">
                            </div>
                           <input type="submit" class="btn btn-info" id="btn-info" name="Submit" value="Submit">
                       </form> </center>
                <div class="" style="margin-left: 20px;">
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$name =$_POST["FEmail"];
$forget= query("select * from login where email= '$name'");
confirm($forget);
while($row= fetch_array($forget))
{
echo "<h2>Your Account Details:</h2>";
echo "<b>Name:</b>&nbsp;".$row['name']; echo "<br>";
echo "<b>Contact no.:</b>&nbsp;".$row['contactno']; echo "<br>";
echo "<b>Department:</b>&nbsp;".$row['department']; echo "<br>";
echo "<b>Year:</b>&nbsp;".$row['year']; echo "<br><br>";
}
?>
</div>
<center>
    <div style="margin-left: 10px; margin-right: 10px;">
<form action="fgscript.php" method="Post">
    <div class="form-group">
        <input type="hidden" name="Femail" value="<?php echo $name;?>" required="true"> 
        <input type="text" class="form-control" name="Fpassword" placeholder="New Password" required="true">
    </div>
        <div class="form-group">
        <input type="text" class="form-control" name="CFpassword" placeholder="Confirm Password" required="true">
    </div>
        <input type="submit" class="btn btn-info" id="btn-info" name="submit" value="Change">
</form></div>
</center>
<?php
}
?>
                    
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>

</body>
<?php require 'footer.php'; ?>