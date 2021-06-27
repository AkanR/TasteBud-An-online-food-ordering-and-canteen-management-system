<?php require_once 'configure.php';?>
<?php require_once 'header.php';?>
<title>Contact Us</title>
<body class="bgadmin">
  <div class="container">
      <br>
    <div class="row">
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header"  id="phead">
                    <img src="images/srcasw.png" >
                        <p class="adminlogin">Contact Us</p>
                </div>
                <div class="card-body">
                    <?php display_message(); ?>
                    <form action="sendmessage.php" method="Post">
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name" required="true" pattern=".{1,10}"/>
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" required="true" pattern="[a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$"/>
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Subject" name="subject" required="true"/>
                            </div>
                           <div class="form-group">
                            <textarea class="form-control" type="textarea" placeholder="Message" name="message" required="true"></textarea>
                            </div>
                           <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="send_message" value="Send Message">
                       </form>
                </div>
            </div>
            </center>
        </div>
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
        </div>
    </div>
</div>
    <br>
</body>
<?php require 'footer.php';?>
    