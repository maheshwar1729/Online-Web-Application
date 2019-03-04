<?php
include("db.php");
 
$user = $_GET['user'];

 

$req ="DELETE FROM CART";
if (mysqli_query($conn, $req)) 
  {
	#echo "Item Purchased Successfully\n";
  } 
else 
  {
	echo "Error in purchasing Items" . mysqli_error($conn);
  }
 
header("Location:items.php?id=$user");
?>
