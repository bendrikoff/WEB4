<?php 
$title="Наложение изображения";
require('header.php') ?>
<div class="folderWeight">
<form action="upload.php" method= "post" enctype="multipart/form-data">
<p>Текст:
<input type="text" name="text">
<p>Изображение:
<input type="file" name="img">
<p>Watermark:
<input type="file" name="mark">
<p>
<input type="submit" value="Загрузить">
</div>
<?php require('footer.php') ?>


