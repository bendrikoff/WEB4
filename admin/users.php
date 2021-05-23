<?php
require("check.php"); 
require("../connectBD.php");

$query ="SELECT * FROM `users`"; 

$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

$number = mysqli_num_rows($result); 
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
                <li><a href="adminPage.php">Игры</a></li>
                <li><a href="publications.php">Публикации</a></li>
                <li><a href="users.php">Пользователи</a></li>
                <li><a href="images.php">Изображения</a></li>
            </ul>
        </div>
        
        <div class="games">
        <a href="add.php?type=users"><button class="addBttn">Добавить пользователя</button></a>

            <div class="users">
            <table border="1">
                <caption>Пользователи</caption>
                <tr>
                    <th>ID</th>
                    <th>Логин</th>
                    <th>Email</th>
                    <th>Группа</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            <?php
                if($number!=0){
                    while (list($id,$login,,$mail,$permission)=mysqli_fetch_array($result)){
                        echo '
                        <tr><td>'.$id.'</td><td>'.$login.'</td><td>'.$mail.'</td><td>'.$permission.'</td><td><a href="change.php?id='.$id.'&type=users"><button>Редактировать</button></a></td><td><a href="delete.php?id='.$id.'&type=users"><button>Удалить</button></a></td></tr>
                        ';
                    }

                }

            ?>
            

                </table>
            

            
                                
        </div>
        </div>
        </div>
    </div>
</body>
</html>