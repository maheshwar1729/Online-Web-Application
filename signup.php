<html>
<head>
    <title>Clothing Store:signup</title>
</head>
<?php
include("db.php");
if(isset($_POST['Submit'])) 
  {    
	$username =$_POST['Username'];
    $password=$_POST['psw'];
    $confirmpassword = $_POST['psw-repeat'];
    echo "<br/><a href='home.html'>HOME page</a>";   
    if(empty($username) || empty($password)|| empty($confirmpassword)) 
	  {
		echo "<br/><a href='signup.html'>Sign Up</a>";         
		if(empty($username)) 
		  {
			echo "<font color='red'>wrong Username: Enter Again</font><br/>";
		  }
		if(empty($password)) 
		  {
			echo "<font color='red'>wrong Password: Enter Again  </font><br/>";
		  }   
		if(empty($confirmpassword)) 
		  {
            echo "<font color='red'>wrong Password: Re-enter Again</font><br/>";
          }
      }
    else 
	  { 
		$req = $conn->query("SELECT * FROM ACCOUNTS where EMAIL=\"$username\"");
        $row = $req->fetch_assoc();
		if($req->num_rows == 0) 
		  {
			if($password != $confirmpassword)
			  {		
				echo "<font color='red'>Passwords doesn't match</font><br/>";
				echo "<br/><a href='signup.html'>Sign up again</a>"; 
			  }
			else
			  {
				$sql = "INSERT INTO ACCOUNTS (EMAIL,PASSWORD) VALUES('$username','$password')";
				if(mysqli_query($conn, $sql)){
					#echo "Records inserted successfully.";
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
				echo "<br><font color='green'>USER Registered successfully.</font><br/>";
				echo "<br><a href='login.html'>Login in</a>";
			  }
		  }
		else
		  {	
			echo "<br><font color='red'>You have an account? Please Log-in</font><br/>";
			echo "<br><a href='login.html'>Sign in</a></br>"; 
		  }
    }
}
?>
</body>
</html>
