<?php require_once 'configure.php';?>
<?php

    if(isset($_POST['send_message']))
    {
        $to         = "tastebud.srcasw@gmail.com";
        $from_name  = $_POST['name'];
        $from_email = $_POST['email'];
        $subject    = $_POST['subject'];
        $message    = $_POST['message'];
        
        $headers= "From: {$from_name}{$from_email}";
        
        $result=mail($to, $subject, $message, $headers);
        
        if(!$result)
        {
            set_message("Sorry! We Are not able to process your message");
            redirect("contact.php");
        }
        
       else {
     set_message("Thank You! your message is received.");
     redirect("contact.php");
 }
    }

?>