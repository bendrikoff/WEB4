<?php
require("check.php");
require("../connectBD.php");

$id = $_GET['id'];
$title = $_POST['title'];
$type = $_POST['type'];
$rating = $_POST['rating'];
$version = $_POST['version'];
$description = $_POST['description'];


if(count($_FILES)!=0){
    $type = $_GET['type'];
    $query ="SELECT img FROM `$type` WHERE id=$id"; 
    $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
    $name = mysqli_fetch_array($result)['img'];
    $tempIMG=$_FILES['img']['tmp_name']; //Путь к файлу
    $files = scandir("../img/$type/");
    move_uploaded_file($tempIMG,"../img/$type/$name");   
    $imgQ=", `img`='$name'";
}




switch($_GET['type']){
    case 'games':
        $query ="UPDATE `games` SET `title` = '$title',`type` = '$type',`rating` = '$rating',`version` = '$version',`description` = '$description' $imgQ WHERE `games`.`id` = $id";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        mysqli_close($connect);
        Header("Location: adminPage.php");
    break;
    case 'publications':
        $query ="UPDATE `publications` SET `title` = '$title',`description` = '$description' $imgQ WHERE `publications`.`id` = $id";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        mysqli_close($connect);
        Header("Location: publications.php");
    break;
    case 'users':
        $login=$_POST['login'];
        $query ="SELECT pass FROM `users` WHERE id=$id"; 

        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        $name = mysqli_fetch_array($result)['pass'];

        $temp = $_POST['pass'];
        // echo($temp);
        // echo("<p>");
        // echo($temp);
        if($temp==$name){
            $qPass = ", `pass`='$temp'";
        }else{
            $temp = md5($_POST['pass']);
            $qPass = ", `pass`='$temp'";
        }

        
        
        $mail = $_POST['mail'];
        $group = $_POST['group'];
        
        $query ="UPDATE `users` SET `login` = '$login' $qPass,`mail`='$mail',`permission`='$group' WHERE `users`.`id` = $id";
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
        mysqli_close($connect);
        Header("Location: users.php");
    break;
}



?>