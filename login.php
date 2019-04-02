<html>
<head>
    <title>Clothing Store:Login page</title>
</head>
<?php
include("db.php");
# print "starting....";
# print $_POST["submit"];
if(isset($_POST["submit"])) 
  {    
    # print "Inside....";
	$box1 =$_POST['username'];  
	$box2=$_POST['password'];
    # print "$box1, $box2";        
    if(empty($box1) || empty($box2)) {
		echo "<br/><a href='login.html'>sorry to ask: Login again<br /></a>";
        if(empty($box1)) {
            echo "<font color='red'>Don't mess with username: empty username</font><br/>";
        }     
	if(empty($box2)) {
            echo "<font color='red'>Don't mess with passwords: empty password</font><br/>";
        }      
    } else {   
       $req1 = $conn->query("SELECT * FROM ACCOUNTS");
	$count =0;
	while($row = $req1->fetch_assoc()) {
		if($row['EMAIL']==$box1){
			$count = $count+1;
		}
	}
	if($count==0){
		echo "<font color='red'>There is no User with this credentials</font><br/>";
		echo "<br/><a href='signup.html'>Sign Up</a>";
	}
	else{
		$req2 = $conn->query("SELECT * from ACCOUNTS where EMAIL=\"$box1\"");
	
		while($row = $req2->fetch_assoc()) {
			$pass = $row['PASSWORD'];
			$id = $row['ID'];
		}
		if ($pass ==$box2){
			echo "<font color='green'>Welcome to the store";
			echo "<br/><a href=\"items.php?id=$id\">View Items in the store</a>";
		}
		else{
			echo "<font color='red'>Please enter correct credentials</font><br/>";
			echo "<br/><a href='login.html'>Sorry to ask: Login again</a>";
			}   
       	}      
    }
}
else {
   print "There is problem in your web page";
}
?>
<img src="image.jpg" width="100%" height="500">
</body>
</html>
