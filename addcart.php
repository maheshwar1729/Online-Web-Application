<html>
<head>    
    <title>CLOTHING STORE:Adding item in Cart</title>
</head>
<?php
include("db.php");
$user = $_GET['user'];
$req = $conn->query("SELECT EMAIL FROM ACCOUNTS where ID = \"$user\"");
 while($row = $req->fetch_assoc()) {
$name = $row['EMAIL'];
}
echo "<h1>Shopping CART</h1>";
$id = $_GET['id'];
$req1 = $conn->query("SELECT * FROM ITEMS WHERE ID=\"$id\"");
while($res = $req1->fetch_assoc())
{
    $type = $res['type'];
    $brand = $res['brand'];
    $colour = $res['colour'];
    $size = $res['size'];   
    $price = $res['price'];
    $quantity = $res['quantity'];
}
if($quantity > 0)
  {	
	$quantity = $quantity-1;
	$req2 = "INSERT INTO CART(type,brand,colour,size,price) VALUES('$type','$brand','$colour','$size', '$price') ";
	if (mysqli_query($conn, $req2)) 
	  {
		echo "<font color='green'>Item added successfully to your cart </font><br/>";
	  } 
	else 
	  {
    		echo "Error in adding item to cart " . mysqli_error($conn);
	  }
	$req3 ="UPDATE ITEMS SET quantity='$quantity' WHERE ID=$id";
	
	if (mysqli_query($conn, $req3)) 
	  {
    		#echo "ITEM is updated successfully\n";
	  } 
	else 
	  {
    		echo "Error in Updating Item " . mysqli_error($conn);
	  }
	echo "<br/><a href=\"cartitems.php?user=$user\">show cart</a>";
	echo "<br/><a href=\"items.php?id=$user\">ADD more items</a>";
  }
else
  {
	echo "<font color='red'>SORRY! Item is not available </font><br/>";
	echo "<br/><a href=\"cartitems.php?user=$user\">show cart</a>";
	echo "<br/><a href=\"items.php?id=$user\">ADD other items</a>";
  }
?>
<img src="image.jpg" width="100%" height="500">
</html>
