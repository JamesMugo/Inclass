<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php
	include('dbconnect.php');
	
	//get user details
	if(isset($_GET['submit'])){
		$usern = $_GET['uname'];
		$upass = $_GET['upass'];
		
		//write query
		$sql = "SELECT * FROM webtechlogin WHERE username='$usern'";
		
		//run query
		$results = mysqli_query($dbcon, $sql);
		
		//check if something is returned
		if($results){
		//fetch one line at a time
		//print_r($results);
		
			$row = mysqli_fetch_assoc($results);
			
			if($row){
				$tbname = $row['username'];
				$tbpass = $row['passwd'];
				
				echo $tbname . " " . $tbpass;
				
				$matches = password_verify($upass, $tbpass);
				if($matches){
					//user valid
					//echo 'correct';
					
					//assign user session
					session_start();
					
					//write session
					$_SESSION['usname'] = $tbname;
					$_SESSION['upass'] = $tbpass;
					
					//redirect to application
					header('Location: select.php');
				}
				else{
					echo 'incorrect';
				}
			}
		}
	}
?>
	<form>
		Username: <input type="text" name="username">
		Password: <input type="password" name="pswd">
		<input type="submit" name="ulogin" value="Login">
	</form>
</body>
</html>
