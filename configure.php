<?php
ob_start();
session_start();
$conn  = mysqli_connect("localhost","root","","");
require_once 'razorpay-php/Razorpay.php';
require_once 'helperfunction.php';
require_once 'adminhelperfunctions.php';
require_once 'common.php';
$merchant_name='TasteBud';
$merchant_logo='images/finallogo.PNG';
$keyId = '';
$keySecret = '';
$displayCurrency = 'INR';
?>
