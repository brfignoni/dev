<?php
//echo '<pre>' , var_dump($_SERVER) , '</pre>';
$filename = basename($_SERVER['PHP_SELF']);
$filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
$dir_path = dirname($_SERVER['PHP_SELF']);
$username_min_length = 5;
$username_max_length = 10;
$password_min_length = 5;
$password_max_length = 10;
$messages = [];
$username = '';
$password = '';
$users_select = '';
?>