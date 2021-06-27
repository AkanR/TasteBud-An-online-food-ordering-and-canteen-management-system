<!-- validate user login -->
<?php require 'configure.php'; ?>
<?php
    if(isset($_POST['login']))
    {
            $email=$_POST["email"];
            $result = query("SELECT * FROM login WHERE (email='" . $_POST["email"] . "') and password = '". $_POST["password"]."'");
            $row = fetch_array($result);
            if($row['email']==$email)
            {
            $_SESSION["email"]=$email;
            if(isset($_SESSION["email"]))
            {
             header("Location:Product.php");
             }     
            } 
            else
            {
                     $message = "Invalid  email or Password!";
                     set_message($message);
                     header("Location:Userlogin.php");
            }   
    }
    
 else 
     {
        set_message("Sorry! Something went wrong.");
        header("Location:Userlogin.php");
     }
?>