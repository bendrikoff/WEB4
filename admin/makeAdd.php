<?php
require("check.php");
require("../connectBD.php");

$id = $_GET['id'];
$title = $_POST['title'];
$type = $_POST['type'];
$rating = $_POST['rating'];
$version = $_POST['version'];
$description = $_POST['description'];



$tempIMG=$_FILES['img']['tmp_name']; //Путь к файлу
$nameIMG=$_FILES['img']['name']; //Имя файла
switch($_GET['type']){
    case 'games':
        $files = scandir("../img/games/");

        $query = "SELECT * FROM `games`"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        $number = mysqli_num_rows($result);
        
        
        move_uploaded_file($tempIMG,"../img/games/game$number.png");
        
        
        $query ="INSERT INTO `games` (`id`, `title`, `type`, `rating`, `version`, `description`, `img`) VALUES (NULL, '$title', '$type', '$rating', '$version', '$description', 'game$number.png')";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        
        mysqli_close($connect);
        Header("Location: adminPage.php");
    break;
    case 'pubs':
        $files = scandir("../img/publications/");

        $query = "SELECT * FROM `publications`"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        $number = mysqli_num_rows($result);
        
        
        move_uploaded_file($tempIMG,"../img/publications/news$number.png");
        
        
        $query ="INSERT INTO `publications` (`id`, `title`,`description`,`img`) VALUES (NULL, '$title','$description', 'news$number.png')";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        mysqli_close($connect);
        Header("Location: publications.php");
    break;
    case 'users': 
        $login=$_POST['login'];
        $pass = md5($_POST['pass']);
        $mail = $_POST['mail'];
        $group = $_POST['group'];
        
        $query ="INSERT INTO `users`  VALUES (NULL, '$login','$pass', '$mail','$group')";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        mysqli_close($connect);
        Header("Location: users.php");
    break;
}


?>