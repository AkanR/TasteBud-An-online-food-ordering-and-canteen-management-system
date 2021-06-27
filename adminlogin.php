<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Admin Login</title>

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
        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-4"><br><center>
            <div class="card">
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">Admin login</p>
                </div>
                <div class="card-body">
                       <form action="admindashboard.php" method="Post">
                            <div class="form-group">
                               <input type="text" class="form-control" name="AEmail" placeholder="Email" required="true">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="admininput" name="APassword" placeholder="Password" required="true">
                                <br><input type="checkbox" onclick="myFunction()"> &nbsp;Show password
                            </div>
                           <input type="submit" class="btn btn-info" id="btn-info" name="Submit" value="Login">
                       </form>
                </div>
            </div></center>
        </div>
    </div>
    <br><br>
</div>
</body>
<?php require 'footer.php'; ?>