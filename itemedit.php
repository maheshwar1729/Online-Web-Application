<?php

include("db.php");


if(isset($_POST['update']))
{    
    $idl = $_POST['id'];   
    $type =$_POST['type'];
    $brand=$_POST['brand'];
    $colour=$_POST['colour'];
    $size=$_POST['size'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity']; 
 
    
    if(empty($type) || empty($brand) || empty($colour) || empty($size) ||  empty($price) || empty($quantity)) {            
        if(empty($type)) {
            echo "<font color='red'>Missing in type section</font><br/>";
        }
        if(empty($brand)) {
            echo "<font color='red'>Missing in brand</font><br/>";
        }  
	if(empty($colour)) {
            echo "<font color='red'>Missing in colour section</font><br/>";
        }
	if(empty($size)) {
            echo "<font color='red'>missing in size section</font><br/>";
        }
	if(empty($price)) {
            echo "<font color='red'>Missing in price section</font><br/>";
        } 
	if(empty($quantity)) {
            echo "<font color='red'>Missing in quantity section</font><br/>";
        
        }     
    } else {    
        
        $req = "UPDATE ITEMS SET type='$type',brand='$brand',colour='$colour',size='$size',price='$price',quantity='$quantity' WHERE ID=\"$idl\"";

		if (mysqli_query($conn, $req)) 
		  {
    		#echo "Item is updated successfully\n";
		  } 
		else 
		  {
    		echo "Error in updating Items " . mysqli_error($conn);
		  }
        
        
        header("Location: totalitems.php");
    }
}
?>
<?php

$ide = $_GET['id'];



$req2 = $conn->query("SELECT * FROM ITEMS WHERE ID=\"$ide\"");
 
while($res = $req2->fetch_assoc())
{
    
    $type = $res['type'];
    $brand = $res['brand'];
    $colour = $res['colour'];
    $size = $res['size'];
    $price = $res['price'];
    $quantity = $res['quantity'];
}
?>

<html>
<head>    
    <title>Clothing Store:Edit Data</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 40%;
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
    <a href="totalitems.php">List of total Items</a>
    <br/><br/>
    
    <form name="form1" method="post" action="itemedit.php">
        <table border="1">
            <tr> 
                <td>TYPE</td>
                <td><input type="text" name="type" value="<?php echo $type;?>"></td>
            </tr>

            <tr> 
                <td>BRAND</td>
                <td><input type="text" name="brand" value="<?php echo $brand;?>"></td>
            </tr>

	    <tr> 
                <td>COLOUR</td>
                <td><input type="text" name="colour" value="<?php echo $colour;?>"></td>
            </tr>

	    <tr>
                <td>SIZE(in SEK)</td>
                <td><input type="text" name="size" value="<?php echo $size;?>"></td>
	    </tr>

	    <tr> 
                <td>PRICE</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>

	    <tr> 
                <td>QUANTITY</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
            <tr align ="left">
                <td><input type="hidden" name="id" value=<?php echo $ide ;?>></td>
		<td><input type="hidden" name="_method" value="put"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
<img src="image.jpg" width="100%" height="500">
</body>
</html>
