<?php
ob_start();
session_start();
$conn  = mysqli_connect("localhost","root","","tastebud");
require_once 'razorpay-php/Razorpay.php';
require_once 'helperfunction.php';
require_once 'adminhelperfunctions.php';
require_once 'common.php';
$merchant_name='TasteBud';
$merchant_logo='images/finallogo.PNG';
$keyId = 'rzp_test_8n34KuhXiDbwPi';
$keySecret = 'YNfXDh4G301hEkuTw3QDwOAR';
$displayCurrency = 'INR';
?>
