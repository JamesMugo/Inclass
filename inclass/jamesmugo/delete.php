<!DOCTYPE html>
<html>
<head>
    <title>delete</title>
</head>
<body style="background-color: lightblue;>

    <h3><u>Deleting from database</u></h3>
<?php
readfile('menu.html');
	include('dbconnect.php');
  $name = '';
  $gender = '';
  $color = '';

  if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }

    if ($ok) {
        // add database code here
    
    //TEST connection
    if(!$dbcon){
        echo 'not connected';
    }else{
        //echo 'connection established';
        //write query
        $sqlstatement = "DELETE FROM webtechtable WHERE username='$name'";
            if (mysqli_query($dbcon, $sqlstatement)) {
                echo "Record deleted successfully";
            } 
            
        }
    }
  }
?>
<form method="post" action="">
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" name="name" value="<?php
        		echo htmlspecialchars($name);
    			?>"><br>
			</td>
		</tr>
		<tr>
			<td></td>
			<td style="padding-left: 45%;"><input type="submit" name="submit" value="Delete"></td>
		</tr>
	</table> 
</form>
</body>
</html>