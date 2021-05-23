<?php
require("check.php"); 
require("../connectBD.php");

$query ="SELECT * FROM `images`"; 


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
            <div class="row">
<?php
        if($number!=0){
            while (list($id, $user,$img)=mysqli_fetch_array($result)) {                
                echo "<div class='game'>
                <a href='../userIMGS/$user/$img.png'  target='_blank'>
                    <img src='../userIMGS/$user/$img.png' alt=''>
                    <div class='gameContent'>
                        <p>$title</p>
                    </div>
                    </a>
                    <div class='buttons'>
                        <a href='delete.php?id=$id&type=images'><button>Уда</button></a>
                    </div>
                </div>
                ";
                 
            }
               
        }
?>           
                                
        </div>
        </div>
        </div>
    </div>
</body>
</html>