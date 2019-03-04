<?php
include("db.php");
 
$user = $_GET['user'];
$req = $conn->query("SELECT EMAIL FROM ACCOUNTS where ID = $user");
 while($row = $req->fetch_assoc()) {
$name = $row['EMAIL'];
}
echo "$name welcome to your cart";
$id = $_GET['id'];
$req2 = $conn->query("SELECT * FROM CART WHERE ID=$id");
 
while($res = $req2->fetch_assoc())
{
    $type = $res['type'];
}

$req3 = "DELETE FROM CART WHERE ID=$id";
if (mysqli_query($conn, $req3)) 
  {
	#echo "Item Deleted from cart successfully\n";
  } 
else 
  {
	echo "Error in Deleting item to cart " . mysqli_error($conn);
  }




$req4 = $conn->query("SELECT * FROM ITEMS WHERE type='$type'");
 
while($res = $req4->fetch_assoc())
{
    $quantity = $res['quantity'];
}
$quantity = $quantity + 1;
$req5 = "UPDATE ITEMS SET quantity='$quantity' WHERE type='$type'";
if (mysqli_query($conn, $req5)) 
  {
	#echo "Item Updated to cart successfully\n";
  } 
else 
  {
	echo "Error in Updating item to cart " . mysqli_error($conn);
  }



echo "<br><font color='green'>Item removed from cart successfully  </font><br/>";
	echo "<br/><a href=\"cartitems.php?user=$user\">show cart</a>";
	echo "<br/><a href=\"items.php?id=$user\">ADD other items</a>";
?>
