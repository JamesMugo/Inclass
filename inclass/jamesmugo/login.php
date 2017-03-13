<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style>
	.error{color: red;}
	</style>
</head>
<body style="background-color: lightblue;">
	<?php
	//$myPassWord = md5('pass123');
	$nameErr = $pswErr = $username = $password = "";

	if(isset($_POST['submit'])){
		if(isset($_POST['username']) && !empty($_POST['username'])){
			$username = $_POST['username'];
		}
		else{
		 $nameErr ="Provide username";
		}
		if(isset($_POST['password']) && !empty($_POST['password'])){
			$password = $_POST['password'];
		}
		else{
		 $pswErr ="Provide password to login";
		}

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

				//select users from the database
				$userlogin = mysqli_query($dbconnect, "SELECT * FROM webtechlogin WHERE username='$username' 
					&& passwd='$password'");

				//confirm details offered by user
				if(mysqli_num_rows($userlogin)==1){
					//direct the user to select page
					$_SESSION['curUser'] = $username;
					header("location:select.php");
				}else{
					echo "invalid user";
				}
			}
	}
	?>
	<form method="post" action="">	
	<table style="padding-top: 15%; margin: auto;">
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="username" 
				value="<?php if (isset($username)) {echo $username;}?>">
				<span class="error">*<?php echo $nameErr?></span>
		  		<br>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="password" 
				value="<?php if (isset($password)) {echo $password;}?>">
				<span class="error">*<?php echo $pswErr?></span>
		  		<br>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="padding-left: 32%;"><input type="submit" name="submit" value="click to login"></td>
		</tr>
	</table>		
	</form>

</body>
</html>