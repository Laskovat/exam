<?php 
require_once '../inc/conn.php';
if (!isset($_SESSION['user_id'])) {
		header("location: ../Login.php");
    }else{
unset($_SESSION['user_id']);
unset($_SESSION['name']);
$_SESSION['success']="you logged out please log in again ";

header("location: ../Login.php");
}





 ?>