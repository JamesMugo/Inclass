<?php
session_start();
if (!isset($_SESSION['curUser']) && $_SESSION['curUser'] !="") {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body style="background-color: lightblue;>
	<?php
	//require('checkvalid.php');
	readfile('menu.html');
	include('dbconnect.php');

	if($dbcon){
		//connection successful
		if(isset($_GET['submit'])){
			if(isset($_GET['mysearch']) && !empty($_GET['mysearch'])){
				//get user search term
				$myterm = $_GET['mysearch'];

			
			//write query
			$sql1 = 'SELECT * FROM webtechtable WHERE username LIKE '.'"%'.$myterm.'%"';

			//execute query
			$result = mysqli_query($dbcon, $sql1);

			//check query returned result
			if(mysqli_num_rows($result)){
				//something 
				//$oneRecord = mysqli_fetch_assoc($result);
				//echo $oneRecord['username'];
				foreach ($result as $rec) {
					echo '<br>'.$rec['username'];
				}
			}
			else{
				echo "<br><br>";
				echo "name not found";
			}
		}
		else{
			echo "<br><br>";
			echo "please enter a name to search";
			echo "<br><br>";
			}
		}
	}
	else{
		//connection failed
		exit();
	}

	?>

	<form>
		Search term: <input type="text" name="mysearch">
		<input type="submit" name="submit" value="Search">
	</form>
</body>
</html>