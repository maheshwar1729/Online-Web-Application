<html>
<head>
    <title>Clothing Store:admin page</title>
</head>
<?php
include("db.php");
if(isset($_POST["submit"])) 
  {    
	$box1 =$_POST['username'];
    $box2=$_POST['password']; 
    if(empty($box1) || empty($box2)) 
	  { 
		echo "<br/><a href='admin.html'>Sorry to ask: Please Sign in again</a>";           
        if(empty($box1)) 
		  {
            echo "<font color='red'> Username is not Entered  </font><br/>";
          }
		else
		  {
		  }
          
		if(empty($box2)) 
		  {
        	echo "<font color='red'> Password is not entered </font><br/>";
          }
      } 
	else 
	  { 
        if($box1=="maheshwar" && $box2 == "0000") 
		  {
       		echo "<font color='green'>Welcome to your Store Mr.Maheshwar";
			echo "<br/><a href='totalitems.php'>Edit Items in the store</a>";
			echo "<br/><a href='accounts.php'>Remove Accounts registered</a>";
		  }
		else
		  {
			echo "<font color='red'> Only Admins are allowed: WRONG CREDENTIALS</font><br/>";
		  }       
       }
  }
else
  {
	echo "Troubleshoot your admin page";
  }
?>
</body>
</html>
