<!-- main page of user side -->
<?php require_once 'configure.php';?>
<?php require_once 'header.php';?> 
     <title>Menu</title>
 
        
        <br>
        <div class="container">
            <center><p class="check_out">Feeling Hungry <?php usersession(); echo $_SESSION['Cname']; ?> ?</p>
            <div class="row">
                <?php get_products(); ?>
                
            </div>
        </div>
        
<?php require 'footer.php';?>
        
        
        
        
        
        
        
         
    
