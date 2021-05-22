<?php

$host = 'localhost'; 
$database = 'mobile-games'; 
$user = 'root'; 
$password = 'root'; 
$connect = mysqli_connect($host, $user, $password, $database);

if (!$connect) {
    die('Error connect to DataBase');
}

?>