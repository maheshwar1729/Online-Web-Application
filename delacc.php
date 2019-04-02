<?php
include("db.php");
$num = $_GET['id'];
#print $num;
$req = "DELETE FROM ACCOUNTS WHERE ID=$num";
if (mysqli_query($conn, $req)) {
    echo "Account Deleted successfully\n";
} else {
    echo "Error in deleting Accont " . mysqli_error($conn);
}
header("Location:home.html"); /* Redirect browser */
?>
