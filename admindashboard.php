<?php require_once 'configure.php';?>
<?php
$result =query("SELECT * FROM admin WHERE (name='" . $_POST["AEmail"] . "') and password = '". $_POST["APassword"]."'");
$row =fetch_array($result);
if($row['name']==$_POST["AEmail"] && $row['password']==$_POST["APassword"] )
{ 
 $_SESSION["name"]=$row['name'];
 if(isset($_SESSION["name"])) 
 {
     redirect("adminboard.php");
 }
}
else
{
set_message("invalid username or password");
redirect("adminlogin.php");
} 
        
?>

