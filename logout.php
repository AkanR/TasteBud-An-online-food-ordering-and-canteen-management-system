<?php require_once 'configure.php';?>
<?php
session_unset();
session_destroy();
header("Location:index.php");
?>
