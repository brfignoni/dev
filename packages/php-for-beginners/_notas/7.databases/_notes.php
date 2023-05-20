<?php
//create database for login app


//include data base connection
include "db.php";

//fetch result rows
while($row = mysqli_fetch_row($result)) {
    print_r($row); //indexed 
}
while($row = mysqli_fetch_assoc($result)) {
    print_r($row); //associative
}

//print connection error
$result = mysqli_query($connection, $query);
if(!$result) {
    die("QUERY FAILED" . mysqli_error($connection));
}

//obtener ruta al nombre del directorio actual desde el document root
echo dirname($_SERVER['PHP_SELF']);

//create object
$object = (object) ['property' => 'Here we go'];

//CONSULTAS:
//consultar si el usuario existe
$query = "SELECT * FROM users WHERE id = '$id'";

//delete user from database
$query = "DELETE FROM users WHERE id = $id";

//update user from databse
$query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
//end of CONSULTAS:
?>
 