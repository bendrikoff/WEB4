<?php
require("check.php"); 
require("../connectBD.php");

$query ="SELECT * FROM `games`"; 


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
                <li><a href="">Игры</a></li>
                <li><a href="publications.php">Публикации</a></li>
                <li><a href="users.php">Пользователи</a></li>
                <li><a href="images.php">Изображения</a></li>
            </ul>
        </div>
        
        <div class="games">
            <a href="add.php?type=games"><button class="addBttn">Добавить игру</button></a>
            <div class="row">
<?php
        if($number!=0){
            while (list($id, $title,$type,,$version,,$img)=mysqli_fetch_array($result)) {                
                echo "<div class='game'>
                <a href=''>
                    <img src='../img/games/$img' alt=''>
                    <div class='gameContent'>
                        <p>$title</p>
    
                    </div>
                    </a>
                    <div class='buttons'>
                        <a href='change.php?id=$id&type=games'><button>Ред</button></a>
                        <a href='delete.php?id=$id&type=games'><button>Уда</button></a>
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