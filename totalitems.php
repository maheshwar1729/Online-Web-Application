<?php

include("db.php");
 

$req = $conn->query("SELECT * FROM ITEMS ORDER BY ID"); 
?>
 
<html>
<head>    
    <title>CLOTHING STORE: Edit Items in Store</title>
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

<body
    <h1>Here comes the ITEMS in this Store</h1>
<p></p>
    <table width='100%' border=10>
        <th style = "color:green;">TYPE</th>
	<th style = "color:green;">BRAND</th>
	<th style = "color:green;">COLOUR</th>
        <th style = "color:green;">SIZE</th>
	<th style = "color:green;">PRICE</th>
	<th style = "color:green;">QUANTITY</th>
        <th style = "color:green;">Options</th>
        </tr>
        <?php 
         
        while($row = $req->fetch_assoc()) {         
            echo "<tr>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['brand']."</td>";
            echo "<td>".$row['colour']."</td>";
	    echo "<td>".$row['size']."</td>";
	    echo "<td>".$row['price']."</td>";
	    echo "<td>".$row['quantity']."</td>";  
            echo "<td><a href=\"itemedit.php?id=$row[ID]\"><button  type=\"button\">EDIT</button></a><a href=\"delitem.php?id=$row[ID]\" onClick=\"return confirm('Are you sure? Delete')\"><button  type=\"button\">DELETE</button></a></td>";  
			
			
	    
        }

echo "<br/><a href='home.html'>Sign Out</a>";
echo "<br/><a href='accounts.php'>Edit Accounts <br /></a>";
        ?>
    </table>
	<a href="shop.html"><button  type="button">Add new ITEM</button></a><br/><br/>
<img src="image.jpg" width="100%" height="500">
</body>
</html>
