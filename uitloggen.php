<?php 
session_start();
if(isset($_GET['stat']) && $_GET['stat'] == 1){
	session_destroy();
	header("location:login.php");
}
?>
