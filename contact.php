<!DOCTYPE HTML>
<html>
    <head>
    <?php
        require('links.php');
    ?>
    <title>Index</title>
    <meta charset="utf-8">
   
    </head>
<body>
 <div class="overlay"></div>
  <div class="upBttn"><div class="arrow">↑</div></div>
  <div class="dialog">
      <button class="close">x</button>
      <div class="dialogContent">
        <p class="thanks"></p>
        <form action="validation.php" class="dialogForm" method="POST" >
            <label for="mail">Ваш e-mail:</label>
            <input type="text" name="email" class="mail" value='<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>' style=
            <?php if(isset($email_error)&&$email_error) { 
                echo('background-color:red');
            }
            ?>
             >
            <label for="number">Ваш номер:</label>
            <input type="text" name="number" class="number" value='<?= !empty($_POST['number']) ? $_POST['number'] : '' ?>' style=
            <?php if(isset($number_error)&&$number_error) { 
                echo('background-color:red');
            }
            ?>
            >
            
            <label for="subject">Ваше обращение:</label>
            <textarea  class="subject" name="subject" placeholder="Введите текст.." style="height:200px; <?php if(isset($message_error)&&$message_error) { 
                echo('background-color:red');
            }
            ?>" style=
            
            ><?php echo($_POST['subject']); ?></textarea>
            <p class="countSym">0/400</p>
            <button type="submit" class="send">Отправить</button>
        </form>
      </div>

      
  </div>
   <header>
       <nav>
          <ul>
              <li class="menu-item"><a href="./publications.php"><img src="./img/icons/publications.png" alt="">ПУБЛИКАЦИИ</a></li>
              <li class="menu-item"><a href=""><img src="./img/icons/new.png" alt="">НОВИНКИ</a></li>
              <li class="menu-item"><a href=""><img src="./img/icons/top.png" alt="">ТОП</a>
                  <ul class="sub-menu">
                      <li><a href="">Топ 100</a></li>
                      <li><a href="">Категории</a></li>
                  </ul>
              </li>
              <li class="menu-item"><a href=""><img src="./img/icons/search.png" alt=""></a></li>
          
          </ul>
       </nav>
   </header>
   
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
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game2.webp" class="avatar" alt="">
                   <h3>Virtual Villagers  2</h3>
                   <p>Симуляторы</p>
                   <div class="appInfo"> <img src="./img/icons/android.png" class="androidIcon" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game3.webp" class="avatar" alt="">
                   <h3>Little Big Snake</h3>
                   <p>Казуальные</p>
                   <div> <img src="./img/icons/android.png"  alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game4.webp" class="avatar" alt="">
                   <h3>Modern Commando Strike</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game5.webp" class="avatar" alt="">
                   <h3>Muse Dash</h3>
                   <p>Музыка</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game6.webp" class="avatar" alt="">
                   <h3>Dungeon Tactics : Heroes</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png"alt=""><p>4.2</p> </div>
                  </a>
              </div>
              
           </div>
                     <div class="itemsRow">
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game2.webp" class="avatar" alt="">
                   <h3>Virtual Villagers  2</h3>
                   <p>Симуляторы</p>
                   <div class="appInfo"> <img src="./img/icons/android.png" class="androidIcon" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game3.webp" class="avatar" alt="">
                   <h3>Little Big Snake</h3>
                   <p>Казуальные</p>
                   <div> <img src="./img/icons/android.png"  alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game4.webp" class="avatar" alt="">
                   <h3>Modern Commando Strike</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game5.webp" class="avatar" alt="">
                   <h3>Muse Dash</h3>
                   <p>Музыка</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game6.webp" class="avatar" alt="">
                   <h3>Dungeon Tactics : Heroes</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png"alt=""><p>4.2</p> </div>
                  </a>
              </div>
              
           </div>          <div class="itemsRow">
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game2.webp" class="avatar" alt="">
                   <h3>Virtual Villagers  2</h3>
                   <p>Симуляторы</p>
                   <div class="appInfo"> <img src="./img/icons/android.png" class="androidIcon" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game3.webp" class="avatar" alt="">
                   <h3>Little Big Snake</h3>
                   <p>Казуальные</p>
                   <div> <img src="./img/icons/android.png"  alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game4.webp" class="avatar" alt="">
                   <h3>Modern Commando Strike</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game5.webp" class="avatar" alt="">
                   <h3>Muse Dash</h3>
                   <p>Музыка</p>
                   <div> <img src="./img/icons/android.png" alt=""><p>4.2</p> </div>
                  </a>
              </div>
              <div class="item">
                  <a href="">
                   
                   <img src="./img/game6.webp" class="avatar" alt="">
                   <h3>Dungeon Tactics : Heroes</h3>
                   <p>Экшен</p>
                   <div> <img src="./img/icons/android.png"alt=""><p>4.2</p> </div>
                  </a>
              </div>
              
           </div>
       </div>
    </div>
   </div>
   </section>

   <?php
        require('footer.php');
    ?>

 