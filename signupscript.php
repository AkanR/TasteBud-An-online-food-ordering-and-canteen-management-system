<?php require_once 'configure.php';?>
<?php 
  if(isset($_POST['signup']))
  {
    $query= query("Select email from login where email='".$_POST["email"]."'");
    confirm($query);
    $row = fetch_array($query);
    if($email==$row['email'])
    {
      set_message("Sorry this Email id is already in use.");
      redirect("Signup.php");  
    }
    else{
    $email=$_POST["email"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $contactno=$_POST["contactno"];
    $type=$_POST["type"];
    $year=$_POST["year"];
    $department=$_POST["Department"];   
    $query= query("insert into login (name, email,password,contactno,type,year,department) values ('$name','$email','$password','$contactno','$type','$year','$department')");
    confirm($query);
    set_message("Congratulation! Account creation successful.");
    redirect("Signup.php");
  } 
  } 
  else
  {
    set_message("Sorry! some error please try again.");
    redirect("Signup.php");  
  }
?>
