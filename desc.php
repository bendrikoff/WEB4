<?php 
require('header.php'); 
if(is_null($_GET['id'])){
  $idGame=1;
}else{
  $idGame=$_GET['id'];
}

require('connectBD.php');
$query ="SELECT * FROM `games` WHERE id=".$idGame; 

$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 
if($result)
{
  list($id, $title,$type,$rating,$version,$description,$img)=mysqli_fetch_array($result);
}



?>



   

      
  </div>
   <section>
       <div class="container">
        <div class="descSection">
         <div class="leftSection">    
          <div class="descBlock">
          <?php
            echo("
                 <div class='leftSide'>
                     <h1>$title</h1>
                     <img src='./img/games/$img' alt='' class='descImg'>
                     <div class='rating'>
                         <div class='counter'><p class='count'>$rating</p></div>
                     </div>
                 </div>
             <div class='rightSide'>
              <div class='tag'>
                <a href=''><p>$type</p></a>
              </div>
              <p class='descText'>$description</p>
             </div>
          </div>")
          ?>
          
          <div class="download">
              <p class="downloadHeader">Скачать Brawl Stars на Android бесплатно</p>
              <div class="downloadItems">
                 <div class="downloadItem">
                    <p>Мод много денег</p>
                    <div class="downloadSec">
                     <a href="">
                      <button>Скачать</button>
                     </a>
                     <p>(25 mb)</p>
                    </div>
                 </div>
                 <div class="downloadItem">
                    <p>Мод много денег</p>
                    <div class="downloadSec">
                     <a href="">
                      <button>Скачать</button>
                     </a>
                     <p>(25 mb)</p>
                    </div>
                 </div>
                 <div class="downloadItem">
                    <p>Мод много денег</p>
                    <div class="downloadSec">
                     <a href="">
                      <button>Скачать</button>
                     </a>
                     <p>(25 mb)</p>
                    </div>

                 </div>
                 
              </div>
          </div>
        </div>
        <div class="rightSection">
            <h1>Рекомендуем скачать</h1>
            <div class="recItems">
                <div class="recItem">
                  <a href="">
                   <img src="./img/rec1.webp" alt="">
                   <h2>Ultimate Custom Night</h2>
                   <p>Ужастик для Андроид, в котором игрок встретит страх. </p>
                  </a>
                </div>
                <div class="recItem">
                  <a href="">
                   <img src="./img/game1.png" alt="">
                   <h2>Mine Survival</h2>
                   <p>Игра популярного ныне жанра survival. </p>
                  </a>
                </div>
                <div class="recItem">
                  <a href="">
                   <img src="./img/rec2.webp" alt="">
                   <h2>Driving School Sim</h2>
                   <p>Реалистичный симулятор вождения на Андроид.</p>
                  </a>
                </div>
                <div class="recItem">
                  <a href="">
                   <img src="./img/rec3.webp" alt="">
                   <h2>Затерянные земли 7</h2>
                   <p>Продолжение серии приключенческих квестов. </p>
                  </a>
                </div>
                <div class="recItem">
                   <img src="./img/rec4.webp" alt="">
                   <h2>Catch And Shoot</h2>
                   <p>Продолжение серии приключенческих квестов. </p>
                </div>
                <div class="recItem">
                  <a href="">
                   <img src="./img/rec1.webp" alt="">
                   <h2>Ultimate Custom Night</h2>
                   <p>Продолжение серии приключенческих квестов. </p>
                  </a>
                </div>
            </div>
        </div>
        
       </div>
       
           
       </div>
       
   </section>
   <?php
        require('telegram.php');
    ?>
   <?php
        require('footer.php');
    ?>
