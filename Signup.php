<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Sign up Now</title>
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
    <div class="row">
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">Sign Up</p>
                </div>
                <div class="card-body">
                    <form action="signupscript.php" method="Post">
                        <?php display_message(); ?>
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name" required="true" pattern=".{1,10}">
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" required="true">
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="password" placeholder="Password" id="myinput" name="password" required="true">
                            </div>
                            <div class="form-group">
                            <input type="checkbox" onclick="myFunction()">&nbsp;Show password
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="tel" placeholder="Contact No" name="contactno" required="true" pattern=".{10,}">
                            </div>
                            <div class="form-group">
                            <label for="User">User: &nbsp;</label>
                            Staff &nbsp;<input type="radio" name="type" value="teacher" required="true"> &nbsp;
                            Student &nbsp;  <input type="radio" name="type" value="student" >
                            </div>
                            <div class="form-group">
                            <label for="Year">Year: &nbsp;</label>
                            1st &nbsp;<input type="radio" name="year" value="1st" >&nbsp;
                            2nd &nbsp;<input type="radio" name="year" value="2nd">&nbsp;
                            3rd &nbsp;<input type="radio" name="year" value="3rd">
                            </div>
                            <div class="form-group">
                            <label for="Department" >Department: &nbsp;</label>
                        <select id="Department" name="Department" required="true" >
                            <option value="" >Choose one</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Instrumentation">Instrumentation</option>
                            <option value="Food Tech.">Food Technology</option>
                            <option value="Comp. Science">Computer Science</option>
                            <option value="Biomedical Science">Biomedical Science</option>
                            <option value="Physics">Physics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Microbiology">Microbiology</option>
                            <option value="Bio-chemistry">Bio-Chemistry</option>
                            <option value="Management studies">Management Studies</option>
                            <option value="Psychology">Psychology</option>
                            <option value="Statistics">Statistics</option>
                        </select>
                            </div>
                          <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="signup" value="Sign Up">
                    </form><br>
                    Already Registered? <a href="Userlogin.php" class="btn btn-info" id="btn-info">Login Now</a>
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
    