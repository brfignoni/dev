<?php   
$mysqli_hostname = "localhost";
$mysqli_username = "root";
$mysqli_password = "root";
$mysqli_database = "loginapp";
$connection = mysqli_connect($mysqli_hostname, $mysqli_username, $mysqli_password, $mysqli_database);

if(!$connection) {   
    die("CONNECTION FAILED");
} 
?>