<?php 
 require("../connectBD.php");

if (!$connect) {
    die('Error connect to DataBase');
}



$query = "SELECT * FROM users WHERE login='". $_POST['username']."' AND pass='".
md5($_POST['pass'])."';";

$q = mysqli_query($connect,$query);
// найден ли кто-нибудь
$n = mysqli_num_rows($q);
session_start(); 
if ($n!==0)
{


 $value=mysqli_fetch_array($q);// записываем логин и емейл в сессию
 $_SESSION['user_login']=$value['login'];
 $_SESSION['email']=$value['email'];
 $_SESSION['permission']=$value['permission'];
// редиректим (перенаправляем) на главную страницу сайта
 $_SESSION['loginMessage']= 'Вы успешно авторизованы';
 Header("Location: ../index.php");
} else {
 $_SESSION['loginMessage']= 'Неверный логин/пароль';
 Header("Location: loginPage.php"); // если юзер не найден, то снова на страницу 
}



?>