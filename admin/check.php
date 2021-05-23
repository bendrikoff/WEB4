<?php 
session_start();
if($_SESSION['permission']!="admin"){
    Header("Location: ../index.php");
}
?>