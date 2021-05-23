<?php
require("check.php"); 
require("../connectBD.php");
$id = $_GET['id'];

switch($_GET['type']){
    case 'games':
        $query ="SELECT img FROM `games` WHERE id=$id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        $name = mysqli_fetch_array($result)['img'];
        if(file_exists("../img/games/$name")){
            unlink("../img/games/$name");
        }
        
        $query ="DELETE FROM `games` WHERE `games`.`id` = $id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
        
        mysqli_close($connect);
        Header("Location: adminPage.php");
    break;
    case 'pubs':
        $query ="SELECT img FROM `publications` WHERE id=$id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        $name = mysqli_fetch_array($result)['img'];
        if(file_exists("../img/publications/$name")){
            unlink("../img/publications/$name");
        }
        
        $query ="DELETE FROM `publications` WHERE `publications`.`id` = $id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
        
        mysqli_close($connect);
        Header("Location: publications.php");
    break;
    case 'users':
        $query ="DELETE FROM `users` WHERE `id` = $id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
        
        mysqli_close($connect);
        Header("Location: publications.php");
    break;
    case 'images':
        $query ="DELETE FROM `images` WHERE `id` = $id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect));
        
        mysqli_close($connect);
        Header("Location: images.php");
    break;
}

?>