<?php
include("db.php");
$num = $_GET['id'];
$req =("DELETE FROM ACCOUNTS WHERE ID=$num");
if (mysqli_query($conn, $req)) {
    #echo "Account is deleted successfully\n";
} else {
    echo "Error deleting registered account " . mysqli_error($conn);
}
header("Location:accounts.php");
?>
