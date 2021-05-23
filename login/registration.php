<?php
 session_start();
 require("../connectBD.php");

 $login = $_POST['username'];
 $email = $_POST['email'];

 $query = "SELECT * FROM users WHERE login='$login'";
$q = mysqli_query($connect,$query);

$n = mysqli_num_rows($q);
if($n!==0){
    $_SESSION['message']="Пользователь с таким логином уже существует";
    Header("Location: registrationPage.php");
    return;
}

$query = "SELECT * FROM users WHERE mail='$email'";
$q = mysqli_query($connect,$query);

$n = mysqli_num_rows($q);
if($n!==0){
   $_SESSION['message']="Пользователь с таким e-mail уже существует";
   Header("Location: registrationPage.php");
   return;
}
 $password = $_POST['pass'];

 $password = md5($password);



 $query_selector = mysqli_query($connect, "INSERT INTO users VALUES (NULL, '$login',  '$password','$email','user')");
 if(!$query_selector){
    echo mysqli_error($connect);
    die('Cannot add user to db');
}
$_SESSION['user_login']=$login;
$_SESSION['email']=$email;
$_SESSION['permission']="user";
Header("Location: ../index.php");
mysqli_close($connect);




?>