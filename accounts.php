<?php

include("db.php");
 

$req = $conn->query("SELECT * FROM ACCOUNTS ORDER BY ID"); 
?>
 
<html>
<head>    
    <title>CLOTHING STORE:Edit Accounts</title>
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
    
    <h1>Here comes all the Accounts registred</h1>
    <table width='100%' border=10>
            <th style = "color:green;">USERNAME</th>
            <th style = "color:green;">PASSWORD</th>
	    <th style = "color:green;">Options</th>
	    
        </tr>
        <?php 
         
        while($row = $req->fetch_assoc()) {         
            echo "<tr>";
            echo "<td>".$row['EMAIL']."</td>";
            echo "<td>".$row['PASSWORD']."</td>";
             
            echo "<td><a href=\"deluser.php?id=$row[ID]\" onClick=\"return confirm('Are you sure: Delete?')\"><button  type=\"button\">DELETE</button></a></td>";  
	    
        }
echo "<br/><a href='home.html'>Sign Out</a>";
echo "<br/><a href='totalitems.php'>Edit items in the store</a>";
        ?>
    </table>
	<img src="image.jpg" width="100%" height="500">
</body>
</html>

