<?php require_once 'configure.php';?>
<?php
if(isset($_POST['submit']))
{
    $mail=$_POST["Femail"];
    $pass=$_POST["Fpassword"];
    $cpass=$_POST["CFpassword"]; 
    if($pass==$cpass)
    {
      $change= query("Update login set password='$pass' where email= '$mail'"); 
      confirm($change);
      set_message("Password Updated successfully! You can now login.");
      redirect("Userlogin.php");
    }
    
    else
    {
     set_message("Password and Confirm Password did not match");
     redirect("forgetpassword.php");   
    }
    
}
?>

