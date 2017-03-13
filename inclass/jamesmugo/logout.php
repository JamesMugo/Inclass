<?php

	//kill all sessions
	session_start();
	
	//destroy all session
	session_destroy();
	
	//redirect to login
	header('Location: login.php');
	
?>
