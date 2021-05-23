<?php   
session_start();

if(is_null($id)){
    $id=1;
}
require("connectBD.php");
$query ="SELECT title FROM `titles` WHERE id=".$id; 
$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

if($result)
{
    $value = mysqli_fetch_array($result); 
}
$title=$value['title'];
mysqli_close($connect);
?>
<!DOCTYPE HTML>
<html>
    <head>
    <?php
        require('links.php');
    ?>
    <title><?php echo($title) ?></title>
    
    <meta charset="utf-8">
   
    </head>
<body>
 
  <div class="upBttn"><div class="arrow">↑</div></div>

   <header>
       <nav>
          <ul>
              <li class="menu-item"><a href="./publications.php"><img src="./img/icons/publications.png" alt="">ПУБЛИКАЦИИ</a></li>
              <li class="menu-item"><a href=""><img src="./img/icons/new.png" alt="">НОВИНКИ</a></li>
              <li class="menu-item"><a href=""><img src="./img/icons/top.png" alt="">ТОП</a>
              <li class="menu-item">
              <?php 
              if(isset($_SESSION['user_login'])){
                  echo('<a href="../login/logout.php">ВЫЙТИ</a>');
              } else{
                echo('<a href="../login/loginPage.php">ВОЙТИ</a>');
              }
              
              ?>
              
                  <ul class="sub-menu">
                      <li><a href="">Топ 100</a></li>
                      <li><a href="">Категории</a></li>
                  </ul>
              </li>
              <li class="menu-item"><a href=""><img src="./img/icons/search.png" alt=""></a></li>
          
          </ul>
       </nav>
   </header>