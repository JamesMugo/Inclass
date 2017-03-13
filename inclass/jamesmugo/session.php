<?php
	session_start();
	
	//check if the user has login
	if(isset($_SESSION['curUser']) && $_SESSION['curUser'] !=""){
	
		//check role of the user
		$myuser =$_SESSION['curUser'];
		echo 'welcome: '.$myuser;
		
	}else{
		//redirect the user
		header('Location: login.php');
	}
?>