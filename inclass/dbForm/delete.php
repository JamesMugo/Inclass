<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
	<h1>Display results from database</h1>
	<?php
	//constant
	define('SERVER','localhost');
	define('USERNAME','root');
	define('PASSWORD','');
	define('DB','webtechclass');
	
	//check if there is a GET request
	if(isset($del))
	//connect to the database
	$dbconnect = mysqli_connect(SERVER,USERNAME,PASSWORD,DB);
	
	//TEST connection
	if(!$dbconnect){
		echo 'not connected';
	}else{
		//echo 'connection established';
		//write query
		$sqlstatement = "DELETE * FROM webtechtable WHERE id='.$'";
		
		//execute query
		$sqlresult = mysqli_query($dbconnect, $sqlstatement);
		
		//loop through
		foreach($sqlresult as $myresult){
			echo $myresult['username'].'<button>Delete</button>'.'<br>';
		}
	}
	?>

</body>
</html>
