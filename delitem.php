<?php
include("db.php");
 

$id = $_GET['id'];


 

$req = "DELETE FROM ITEMS WHERE ID=$id";

if (mysqli_query($conn, $req)) {
    #echo "Product is deleted successfully\n";
} else {
    echo "Error in deleting item: " . mysqli_error($conn);
}
 
header("Location:totalitems.php");
?>
