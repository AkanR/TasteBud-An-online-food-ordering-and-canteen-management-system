<?php require_once 'configure.php';?>
<?php require_once 'header.php';?> 

<div class="container">
    <br>
    <?php display_message(); ?>
    <center><p class="check_out">View Products</p></center>
        <center>
            <table class="table table-hover table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>Out of Stock</th>
                            
                        </tr>
                     </thead>
                     <tbody>
                         <?php admin_viewproducts(); ?>
                     </tbody>
            </table>
        
        </center>
    
</div>
<?php require 'footer.php';?>