<?php require_once 'configure.php';?>
<?php  
 //excel.php  
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename='.rand().'.xls');  
 echo $_GET["data"];  
 ?> 