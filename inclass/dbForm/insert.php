<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
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
    if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    } else {
        $gender = $_POST['gender'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    } else {
        $color = $_POST['color'];
    }

    if ($ok) {
        // add database code here
		
		//make database connection 
		$dbcon = mysqli_connect('localhost','root','','webtechclass');
		//check if connection is successful
		if(!$dbcon){
			echo 'Database connection failed';
			//exit();
		}
		else{
			echo 'connection succesful';
			//write query
			$sql = sprintf("INSERT INTO webtechtable(username, gender, color)
					VALUES('%s','%s','%s')", 			
					mysqli_real_escape_string($dbcon, $name),
					mysqli_real_escape_string($dbcon, $gender),
					mysqli_real_escape_string($dbcon, $color)
					);
			//execute query
			$exec = mysqli_query($dbcon,$sql);
			if(!$exec){
				echo mysql_error();
			}
			//else{
				//$dbcon.close();
			//}
		}
    }
  }
?>
<form method="post" action="">
    User name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
    ?>"><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php
            if ($gender === 'f') {
                echo ' checked';
            }
        ?>>female
        <input type="radio" name="gender" value="m"<?php
            if ($gender === 'm') {
                echo ' checked';
            }
        ?>>male<br>
    Favorite color:
        <select name="color">
            <option value="">Please select</option>
            <option value="#f00"<?php
                if ($color === '#f00') {
                    echo ' selected';
                }
            ?>>red</option>
            <option value="#0f0"<?php
                if ($color === '#0f0') {
                    echo ' selected';
                }
            ?>>green</option>
            <option value="#00f"<?php
                if ($color === '#00f') {
                    echo ' selected';
                }
            ?>>blue</option>
        </select><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>