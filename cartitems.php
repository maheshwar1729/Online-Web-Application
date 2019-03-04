<?php

include("db.php");
$user = $_GET['user'];
$req = $conn->query("SELECT EMAIL FROM ACCOUNTS where ID = \"$user\"");
while($row = $req->fetch_assoc()) 
  {
	$name = $row['EMAIL'];
  }
$req = $conn->query("SELECT * FROM CART");
?>
<html>
<head>    
    <title>Clothing Store: Cart Items</title>
    <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 70%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
 
<body>
    
    <h1>Cart items</h1>
    <table width='100%' border=1>
            <th style = "color:green;">Type</th>
            <th style = "color:green;">Brand</th>
	    <th style = "color:green;">Colour</th>
	    <th style = "color:green;">Size</th>
	    <th style = "color:green;">Price</th>
            <th style = "color:green;"></th>
        </tr>
        <?php 
         echo "<h1>$name cart</h1>";
        while($row = $req->fetch_assoc()) {         
            echo "<tr>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['brand']."</td>";
            echo "<td>".$row['colour']."</td>";
	    echo "<td>".$row['size']."</td>";
	    echo "<td>".$row['price']."</td>";
	     
            echo "<td><a href=\"delcart.php?id=$row[ID]&user=$user\" onClick=\"return confirm('Are you sure:delete?')\"><button  type=\"button\">REMOVE</button></a></td>";  
	    
        }
echo "<br/><a href=\"items.php?id=$user\">Add other items</a>";

$res = $conn->query("SELECT * FROM CART");
$count = 0;
 while($row = $res->fetch_assoc()) {         
            
	    
	   $count = $count + $row['price'];
	     
              
	    
        }
echo "<h1>Total = $count </h1>";

echo "<h1><a href=\"purchase.php?user=$user\" onClick=\"return confirm('purchase these items for $count')\"><button  type=\"button\">PURCHASE</button></a></h1>";

        ?>
    </table>
<p><a href="signout.php"> signout here</p></a>
<img src="image.jpg" width="100%" height="500">
</body>
</html>
