<!-- user login page will redirect to loginscript.php to validate login -->
<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Login Now</title>
<script>
    function myFunction()
    {
            var x = document.getElementById("myinput");
                    if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
    }
</script>
<body class="bgadmin">
  <div class="container">
      <br>
      <?php display_message();?>
    <div class="row">
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6  col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">Login Now</p>
                </div>
                <div class="card-body">
                    <form action="loginscript.php" method="Post">
                        
                            <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" required="true">
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="password" id="myinput" placeholder="Password" name="password" required="true">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" onclick="myFunction()">&nbsp;Show password <br>
                                <a class="mya" href="forgetpassword.php">Forgot your password?</a>
                            </div>
                           <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="login" value="Login">
                    </form><br>
                    Are you a new user? <a href="Signup.php" class="btn btn-info" id="btn-info">Sign Up</a>
                </div>
            </div>
            </center>
        </div>
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
    </div>
</div>
    <br>
</body>
<?php require 'footer.php';?>
    