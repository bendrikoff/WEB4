<?php 
$id=3;
require('header.php');
require('connectBD.php');

$query ="SELECT * FROM `publications`"; 
$result = mysqli_query($connect, $query) or die("Ошибка " . mysqli_error($connect)); 

$number = mysqli_num_rows($result); 

?>
   <script>
    var el =document.getElementsByClassName('menu-item');
                   

    for(var i=0;i<el.length;i++){
        el[i].addEventListener('mouseenter',showSub,false);
        el[i].addEventListener('mouseleave',hideSub,false);
    }
    function showSub(){
        if(this.children.length>1){
            this.children[1].style.opacity='1';
            this.children[1].style.overflow='visible';
            
        }
    }
    function hideSub(){
        if(this.children.length>1){
            this.children[1].style.opacity='0';
            this.children[1].style.overflow='hide';
            
        }
    }
 
</script>
  
      
  </div>
   <section>
       <div class="container">
        <div class="descSection">
         <div class="leftSection"> 
          <div class="pubs">
              <h1>Публикации</h1>
              <div class="pubsItems">
<?php
        if($number!=0){
            $i=0;
            while (list(, $title,$description,$img)=mysqli_fetch_array($result)) {
                $i++;                 
                echo "
                <div class='pubsItem'>
                  <a href=''>
                   <img src='./img/publications/$img' alt=''>
                   <h2>$title</h2>
                   <p>$description</p>
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