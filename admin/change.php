<?php
require("check.php"); 
require("../connectBD.php");
$id = $_GET['id'];

switch($_GET['type']){
    case 'games':
        $query ="SELECT * FROM `games` WHERE id=$id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

        list(, $title,$type,$rating,$version,$desc,$img)=mysqli_fetch_array($result);
    break;
    case 'pubs':
        $query ="SELECT * FROM `publications` WHERE id=$id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

        list(,$title,$desc,$img)=mysqli_fetch_array($result);
    break;
    case 'users':
        $query ="SELECT * FROM `users` WHERE id=$id"; 
        $result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

        list(,$login,$pass,$mail,$group)=mysqli_fetch_array($result);
    break;
}
mysqli_close($connect);

?>
<!DOCTYPE HTML>
<html>
    <head>

    <meta charset="utf-8">
    <link media="all" rel="stylesheet" type="text/css"  href="../css/styleAdmin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">        
    </head>

<body>
    <div class="header">
        <div class="logo">  <strong>Админ</strong>  панель </div>
        
    </div>
    <div class="content">
        <div class="menu">
            <ul>
                <li><a href="">Игры</a></li>
                <li><a href="publications.php">Публикации</a></li>
                <li><a href="users.php">Пользователи</a></li>
                <li><a href="images.php">Изображения</a></li>
            </ul>
        </div>
        
        <div class="change">
            <?php 
            
            switch($_GET['type']){
                case 'games':
                    echo'
                    <form action="makeChange.php?id='.$id.'&type=games" method="post" enctype="multipart/form-data">
                      
                    <label for="login">Заголовок </label><input type="text" name="title" value="'.$title.'" required>
                    <p><label for="login">Тип </label><input type="text" name="type" value="'.$type.'" required></p>
                    <p><label for="login">Рейтинг </label><input type="number" name="rating" value="'.$rating.'" required></p>
                    <p><label for="email">Версия </label><input type="text" name="version" value="'.$version.'" required></p>
                    <p><label for="email">Описание </label><textarea required name="description">'.$desc.'</textarea ></p>
                    <p><label for="email">Картинка </label><input type="file" name="img"></p>
                    <button >Submit</button>';
                break;
                case 'pubs':
                    echo'
                    <form action="makeChange.php?id='.$id.'&type=publications" method="post" enctype="multipart/form-data">
                    <label for="login">Заголовок </label><input type="text" name="title" value="'.$title.'" required>
                    <p><label for="email">Описание </label><textarea required name="description">'.$desc.'</textarea ></p>
                    <p><label for="email">Картинка </label><input type="file" name="img"></p>
                    <button >Submit</button>';
                break;
                case 'users':
                    echo'
                    <form action="makeChange.php?id='.$id.'&type=users" method="post" enctype="multipart/form-data">
                    <p><label for="login">Логин </label><input type="text" name="login" value="'.$login.'" required>
                    <p><label for="login">Пароль </label><input type="password" name="pass" value="'.$pass.'" required>
                    <p><label for="login">Email </label><input type="email" name="mail" value="'.$mail.'" required>
                    <p><label for="login">Группа </label><input type="text" name="group" value="'.$group.'" required>
                    <p><button >Submit</button>';
                break;
            }
            
            
            ?>
            </form>

        </div>
    </div>
</body>
</html>