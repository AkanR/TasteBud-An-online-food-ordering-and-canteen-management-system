<!-- user header session -->
<?php
if(isset($_SESSION['email']))
{
?>
<header id="hdesign"  >
           
           <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style=" background-color: #700202 ; ">
               <div class="container">
                   <a class="navbar-brand" href="Product.php"><img src="images/finallogo.PNG" height="60px"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar navbar-nav end">
      <li class="nav-item active ">
          <a class="nav-link" href="Product.php" style="color: white;"><b>Menu</b></a>
      </li>
      <?php 
      $advance= query("Select * from login where email='{$_SESSION['email']}'");
      confirm($advance);
      $rowadvnace= fetch_array($advance);
      if($rowadvnace['type']=='teacher'){
          ?>
      <li class="nav-item">
          <a class="nav-link" href="placeadvanceorders.php" style="color: white;"><b>Advance Order</b></a>
      </li>
          <?php
      }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="Recent Orders.php" style="color: white;"><b>Your Orders</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="useraccount.php" style="color: white;"><b>My Account </b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color: white;"><b>Logout</b></a>
      </li>
    </ul>
  </div>
               </div>
</nav>
        </header>
<!-- user header session end -->
<!-- admin header session -->
<?php
}
elseif(isset($_SESSION['name']))
{
?>
<header id="hdesign"  >
           
           <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style=" background-color: #700202 ; ">
               <div class="container">
                <a class="navbar-brand" href="adminboard.php"><img src="images/finallogo.PNG"  height="60px"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar navbar-nav end">
      <li class="nav-item">
          <a class="nav-link" href="Vieworders.php" style="color: white;"><b>Live Orders</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="advanceorders.php" style="color: white;"><b>Advance Orders</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="View Products.php" style="color: white;"><b>Today's Menu</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="Edit_products.php" style="color: white;"><b>Edit Products</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="addnewproduct.php" style="color: white;"><b>Add Product</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Served Orders.php" style="color: white;"><b>Served Orders</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="orderissues.php" style="color: white;"><b>Issues</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color: white;"><b>Logout</b></a>
      </li>
    </ul>
  </div>
               </div>
</nav>
        </header>
<!-- admin header session end -->
<!-- main header session -->
<?php
}
else{
?>
<header id="hdesign"  >
           
           <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style="color: white; ">
               <div class="container">
                   <a class="navbar-brand" href="index.php"><img src="images/transparentlogo.png" height="60px"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                   <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-family: 'unbuntu'; font-size: 20px;">
      <ul class="navbar navbar-nav end">
      <li class="nav-item">
        <a class="nav-link" href="adminlogin.php" style="color: white;"><b>Admin Login</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Userlogin.php" style="color: white;"><b>Login Now</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php" style="color: white;"><b>About Us</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="contact.php" style="color: white;"><b>Contact Us</b></a>
      </li>
    </ul>

  </div>
               </div>
</nav>
        </header>
<?php
}
?>
<!-- main header sessionend -->