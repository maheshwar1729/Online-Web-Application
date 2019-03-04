<html>
<head>
    <title>Clothing Store</title>
</head>
<?php
include("db.php");
 
if(isset($_POST['Submit'])) {  
    $type =$_POST['TYPE'];
    $brand=$_POST['BRAND'];
    $colour=$_POST['COLOUR'];
    $size=$_POST['SIZE'];
    $price=$_POST['PRICE'];
    $quantity=$_POST['QUANTITY'];    
    
    if(empty($type) || empty($brand) || empty($colour) || empty($size) || empty($price) || empty($quantity)) {            
        if(empty($type)) {
            echo "<font color='red'>Missing in types section</font><br/>";
        }
        
        
        if(empty($brand)) {
            echo "<font color='red'>Missing in brand section</font><br/>";
        }  
	if(empty($colour)) {
            echo "<font color='red'>Missing in Colour section</font><br/>";
        }
	
	if(empty($size)) {
            echo "<font color='red'>Missing in size section</font><br/>";
        }
        
	if(empty($price)) {
            echo "<font color='red'>Missing in Price section</font><br/>";
        } 
	if(empty($quantity)) {
            echo "<font color='red'>Missing in Quantity section</font><br/>";
        
        } 
    }      
    else { 
        
        $req = "INSERT INTO ITEMS (type,brand,colour,size,price,quantity) VALUES('$type','$brand','$colour','$size','$price','$quantity')";
		


		if (mysqli_query($conn, $req)) {
    		#echo "New item is inserted successfully\n";
		} else {
    		echo "Error in inserting item in Database " . mysqli_error($conn);
		}
	
	       
       	
        echo "<font color='green'>New Item Added Sucessfully";
        echo "<br/><a href='totalitems.php'>View the all items</a>";
    }
}

?>
</body>
</html>
