<!DOCTYPE html>
<html>
  <head>
      <title>Form Handling</title>
  </head>
  <body>
      <!--Process form with php here-->
	  <?php
	  //check if submit button is clicked
	  if(isset($_GET['submit'])){
	  	//echo 'I clicked submit';
		$name = $_GET['name'];
		$psw=$_GET['password'];
		$sex=$_GET['gender'];
		$col=$_GET['color'];
		$lan=implode($_GET['languages']);
		$comnt=$_GET['comments'];
		$check=$_GET['tc'];
		
		//display results here
		displayData($name,$psw,$sex,$col,$lan,$comnt,$check);
	  }else{
	  	echo 'no action done';
	  }
	  //function to display user input
	  //declare a function that take the 7 parameters
	  function displayData($a,$b,$c,$d,$e,$f,$g){
	  	printf('%s,%s,%s,%s,%s,%s,%s',$a,$b,$c,$d,$e,$f,$g);
	  }
	  //validation function
	 /* function validUserData($a,$b,$c,$d,$e,$f,$g){
	  	
	  }*/
	  
	  ?>
      <form method="post" action="">
          User name: <input type="text" name="name"><br>
		  <!--name here is used as the key to which the text is stored-->
          Password: <input type="password" name="password"><br>
          Gender:
              <input type="radio" name="gender" value="f">female
              <input type="radio" name="gender" value="m">male<br>
          Favorite color:
              <select name="color">
                  <option value="#f00">red</option>
                  <option value="#0f0">green</option>
                  <option value="#00f">blue</option>
              </select><br>
          Languages spoken:
              <select name="languages[]" multiple size="3">
                  <option value="en">English</option>
                  <option value="fr">French</option>
                  <option value="it">Italian</option>
              </select><br>
          Comments: <textarea name="comments"></textarea><br>
          <input type="checkbox" name="tc" value="ok">I accept the T&C<br>
          <input type="submit" name="submit" value="Submit">
      </form>
  </body>
</html>