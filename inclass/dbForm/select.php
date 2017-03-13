<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<h1>Display results from database</h1>
	<?php
	//constant
	define('SERVER','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DB','webtechclass');
	
	//connect to the database
	$dbconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DB);
	
	//TEST connection
	if(!$dbconnect){
		echo 'not connected';
	}else{
		//echo 'connection established';
		//write query
		$sqlstatement = "SELECT * FROM webtechtable";
		
		//execute query
		$sqlresult = mysqli_query($dbconnect, $sqlstatement);
		
		//loop through
		foreach($sqlresult as $myresult){
			echo $myresult['username'].'<br>';
		}
	}
	?>

</body>
</html>
