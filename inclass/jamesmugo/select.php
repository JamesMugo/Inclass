<!DOCTYPE html>
<html>
<head>
	<title>display</title>
</head>
<body style="background-color: lightblue;>
	<h3><u>Displaying results from database</u></h3>
	<?php
	readfile('menu.html');
	include('dbconnect.php');
	//constant
	/*define('SERVER','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DB','webtechclass');
	
	//connect to the database
	$dbconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DB);*/
	
	//TEST connection
	if(!$dbcon){
		echo 'not connected';
	}else{
		//echo 'connection established';
		//write query
		$sqlstatement = "SELECT * FROM webtechtable";
		
		//execute query
		$sqlresult = mysqli_query($dbcon, $sqlstatement);
		
		//loop through
		foreach($sqlresult as $myresult){
			echo '<br>'.$myresult['username'];
		}
	}
	?>

</body>
</html>
