<?php 
session_start();
require('header.php') ?>
<div class="folderWeight">
<?php 
require("connectBD.php");
$types = array('image/png', 'image/jpeg'); //Проверка расширения файла
if (!in_array($_FILES['img']['type'], $types)||!in_array($_FILES['mark']['type'], $types)){
header('Content-Type: text/html; charset=utf-8');
echo "Файл не является изображением. <a href='watermark.php' style='color:blue' >Вернуться на страницу загрузки </a>";
exit();
}
 
$tempIMG=$_FILES['img']['tmp_name']; //Путь к файлу
$nameIMG=$_FILES['img']['name']; //Имя файла
 
$tempMark=$_FILES['mark']['tmp_name']; //Путь к файлу
$nameMark=$_FILES['mark']['name'];

$text=$_POST['text'];

move_uploaded_file($tempIMG, $nameIMG); //Загрузка файла
move_uploaded_file($tempMark, $nameMark);


switch($_FILES['mark']['type']){
    case('image/png'):
        $stamp = imagecreatefrompng($nameMark);
    break;
    case('image/jpeg'):
        $stamp = imagecreatefromjpeg($nameMark);
    break;
    
}


switch($_FILES['img']['type']){
    case('image/png'):
        $im = imagecreatefrompng($nameIMG);
    break;
    case('image/jpeg'):
        $im = imagecreatefromjpeg($nameIMG);
    break;
    
}
//imagecopyresampled($im,$stamp,15,15,0,0,150,150,imagesx($im),imagesy($im));



$marge_right = 15;
$marge_bottom = 15;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

$font = dirname(__FILE__) . '/fonts/Roboto-Bold.ttf';
$color = imageColorAllocate($im, 255, 255, 255);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
imagettftext($im, 12, 0, imagesx($im) - $sx - strlen($text)*5, imagesy($im) - $sy - 30, $color, $font, $text);
// Вывод и освобождение памяти
$userName = $_SESSION['user_login'];
$path = "userIMGS/".$userName ;
if(!file_exists($path)){
    mkdir("userIMGS/".$userName );
    
}
$files = scandir($path);
$idImage=max(array_keys($files));
imagepng($im,$path."/".$idImage.".png");
$query = "INSERT INTO images VALUES (NULL, '$userName','$idImage')";
$query_selector = mysqli_query($connect, $query);
imagedestroy($im);
unlink($nameMark);
unlink($nameIMG);

echo('<a href="'.$path."/".$idImage.'.png" target="_blank" style="color:blue">Ссылка на изображение</a>');
?>
</div>
<?php require('footer.php') ?>
