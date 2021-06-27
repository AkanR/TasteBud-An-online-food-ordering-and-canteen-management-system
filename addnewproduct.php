<?php require_once 'configure.php';?>
<?php require_once 'header.php';?> 
<title>Add New Product</title>

<div class="container">
    <center><p class="check_out">Add New Product</p><br>
        <form action="addproducts.php" method="post" enctype="multipart/form-data">
    <div class="row orderadmin  input-group">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <label><b>Product Name</b></label>
            <br>
            <input type="text" class="form-control" name="product_name" placeholder="Product Name" required="true">   
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <label><b>Product Price</b></label>
            <br>
            <input type="text" class="form-control" name="product_price" placeholder="Rs." required="true" pattern="[0-9]{1,3}">   
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <label><b>Product Quantity</b></label>
             <br>
            <input type="text" class="form-control" name="product_qty" placeholder="Product Quantity" required="true" pattern="[0-9]{1,3}">   
        <br><br></div>       
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            <label><b>Product Image</b></label>
              <input type="file" name="product_image" required="true" >
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            
        </div>
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-4">
            <input type="submit" name="publish_product" value="PUBLISH" class="btn btn-success">
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
            
        </div>
    </div>        
</form>
</center>
</div>
<?php require 'footer.php';?>
