<!DOCTYPE html>
<html>
<head>
    <title>updating</title>
</head>
<body style="background-color: lightblue;>
    <h3><u>Updating database</u></h3>
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
    
    //TEST connection
    if(!$dbcon){
        echo 'not connected';
    }else{
        //echo 'connection established';
        //write query
        $sqlstatement = "UPDATE webtechtable SET gender = '$gender', color = '$color' WHERE username='$name'";
            if (mysqli_query($dbcon, $sqlstatement)) {
                echo "Record updated successfully";
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
            <td>Gender</td>
            <td>
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
            </td>
        </tr>
        <tr>
            <td>Favorite color</td>
            <td>
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
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 40%;"><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>