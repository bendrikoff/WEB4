<?php 
$id=2;
require('header.php'); 
require('connectBD.php');
$query ="SELECT * FROM `games`"; 

$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

$number = mysqli_num_rows($result); 
mysqli_close($connect);

?>


   
    <div class="slider">
       <div class="topItem">
           <h1>1</h1><h2>место</h2><a href="./desc.php"><img src="./img/1slider.png" alt=""><p>PUBG MOBILE</p></a>
       </div>
       <div class="topItem">
           <h1>2</h1><h2>место</h2><a href="./desc.php"><img src="./img/2slider.png" alt=""><p>BRAWL STARS</p></a>
           </div>
       <div class="topItem"> 
           <h1>3</h1><h2>место</h2><a href=""><img src="./img/3slider.png" alt=""><p>Last Day on Earth</p></a>
       </div>
    </div>

    <?php
        require('telegram.php');
    ?>

   <section>
   <div class="container">
    <div class="items">
       <h1>Новинки</h1>
       <div class="tags">
           <div class="tag">
            <img src="./img/icons/arcade.png" alt="">
             <a href=""><p>Аркады</p></a>
           </div>
           <div class="tag">
            <img src="./img/icons/simulators.png" alt="">
             <a href=""><p>Симуляторы</p></a>
           </div>
           <div class="tag">
            <img src="./img/icons/strategy.png" alt="">
             <a href=""><p>Стратегии</p></a>
           </div>
           <div class="tag">
            <img src="./img/icons/shooters.png" alt="">
             <a href=""><p>Шутеры</p></a>
           </div>
       </div>
       <div class="itemsList">
          <div class="itemsRow">
<?php
        if($number!=0){
            $i=0;
            while (list($id, $title,$type,,$version,,$img)=mysqli_fetch_array($result)) {
                $i++;                 
                echo "
                <div class='item'>
                <a href='./desc.php?id=$id'>
                 <img src='./img/games/$img' class='avatar' >
                 <h3>$title</h3>
                 <p>$type</p>
                 <div class='appInfo'> <img src='./img/icons/android.png' class='androidIcon' alt=''><p>$version</p> </div>
                </a>
            </div>";
                if($i%5==0){
                    echo'</div>';
                    echo'<div class="itemsRow">';
                }
                 
            }
               
        }
?>
              
              
           </div>
                     
              
           </div>
       </div>
    </div>
   </div>
   </section>

   <?php
        require('footer.php');
    ?>
 