<?php
include("db.php");
$req = $conn->query("SELECT * FROM CART");
while($res = $req->fetch_assoc())
{
	print "inside";
	$quantity = 0;
    	$type = $res["type"];
	$req2 = $conn->query("SELECT * FROM ITEMS WHERE type='$type'");
	while($rep = $req2->fetch_assoc())
	{
    		$quantity = $rep['quantity'];
	}
	$quantity = $quantity + 1;
	$req3 = $conn->prepare("UPDATE ITEMS SET quantity='$quantity' WHERE type='$type'");
}
$req = $conn->query("DELETE FROM CART");
header("Location:home.html");
?>
