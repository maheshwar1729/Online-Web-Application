<?php
$servername = "192.168.200.8";
$username = "vm_www";
$password = "0000";
$database = "mach";
global $conn;



$firstconn = new mysqli($servername, $username, $password);
// Check connection
if ($firstconn->connect_error) {
    die("Connection failed: " . $firstconn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS mach";
if ($firstconn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
    echo "Error creating database: " . $firstconn->error;
}

$firstconn->close();



$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS `ACCOUNTS` (
    `ID` int(11)  NOT NULL auto_increment,
    `EMAIL` varchar(255) NOT NULL default '',
    `PASSWORD` varchar(255) NOT NULL default '',
   PRIMARY KEY ( ID ))";


if (mysqli_query($conn, $sql)) {
    #echo "Users table is created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$table2 = "CREATE TABLE IF NOT EXISTS `ITEMS` (`ID` int(11)  NOT NULL auto_increment, `type` varchar(30) NOT NULL default '', `brand` varchar(30) NOT NULL default '', `colour` varchar(30) NOT NULL default '', `size` varchar(30) NOT NULL default '', `price` int(30) NOT NULL, `quantity` int(30) NOT NULL, PRIMARY KEY ( ID ))";


if (mysqli_query($conn, $table2)) {
    #echo "Products table is created successfully\n";
} else {
    echo "Error creating Products table: " . mysqli_error($conn);
}

$table3 = "CREATE TABLE IF NOT EXISTS `CART` (`ID` int(11)  NOT NULL auto_increment, `type` varchar(30) NOT NULL default '',  `brand` varchar(30) NOT NULL default '', `colour` varchar(30) NOT NULL default '', `size` varchar(30) NOT NULL default '', `price` int(30) NOT NULL, PRIMARY KEY ( ID ))";


if (mysqli_query($conn, $table3)) {
    #echo "Products table is created successfully\n";
} else {
    echo "Error creating Products table: " . mysqli_error($conn);
}
?>
