<?php

include("db.php");
$user = $_GET['id'];

$search = $conn->query("SELECT EMAIL FROM ACCOUNTS where ID=$user");
while($row = $search->fetch_assoc()) 
  {
	$name = $row['EMAIL'];
  }


$req = $conn->query("SELECT * FROM ITEMS"); 
?>
 
<html> 
<head>    
    <title>Clothing Store:Items</title>
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
    <h1>List of all Items</h1>

    <table width='100%' border=10>
        <th style = "color:green;">TYPE</th>
	<th style = "color:green;">BRAND</th>
        <th style = "color:green;">COLOUR</th>
        <th style = "color:green;">PANTS</th>
	<th style = "color:green;">PRICE</th>
	<th style = "color:green;">QUANTITY</th>
        <th style = "color:green;">Options</th>
        </tr>
        <?php 
        echo "<h1>$name, Choose the best product you like</h1>";
        while($row = $req->fetch_assoc()) 
	 {         
            echo "<tr>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['brand']."</td>";
	    echo "<td>".$row['colour']."</td>";
            echo "<td>".$row['size']."</td>";
	    echo "<td>".$row['price']."</td>";
	    echo "<td>".$row['quantity']."</td>";  
            echo "<td><a href=\"addcart.php?id=$row[ID]&user=$user\"><button  type=\"button\">ADD</button></a></td>";
         }

echo "<br/><a href=\"cartitems.php?user=$user\">view items in Cart</a>";
echo "<br/><a href=\"delacc.php?id=$user\">Delete my Account</a>";
echo "<br/><a href='signout.php'>Sign Out</a>";
        ?>
    </table>
<img src="image.jpg" width="60%" height="300">
</body>
</html>
