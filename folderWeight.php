<?php 
$title="Размер";
require('header.php') ?>
<div class="folderWeight">
<?php
    $dirname = $_GET['name'];
    $flag = true;
    if($dirname == ""&&$flag){
        echo("Введите имя папки");
        $flag=false;
    }

    if(strpos($dirname,'..')!==false&&$flag){
        echo("Введите имя папки");
        $flag=false;
    }
    $dirname = dirname(__FILE__)."/".$dirname;
    if(!file_exists($dirname)&&$flag){
        echo("Такой папки или файла не существует");
        $flag=false;
    
    }

    if($flag==true){
        echo($dirname."\r\n");
    //ф-я для определения текущей папки
    //сделать и добавить хедер и футер
    //если папки не существует выводить сообщение
    //сделать чтобы нельзя было использовать (../)
    //сделать редирект после успешной отправки данных(чтобы удалились значения)
    $size = getFilesSize($dirname); 
    $formSize = format_size($size); 
    echo $formSize;
    }

    function getFilesSize($path)
    {
        $fileSize = 0;
       
    
        if(is_dir($path)){
            $dir = scandir($path);
        foreach($dir as $file)
        {
            if (($file!='.') && ($file!='..'))
                if(is_dir($path . '/' . $file))
                    $fileSize += getFilesSize($path.'/'.$file);
                else
                    $fileSize += filesize($path . '/' . $file);
        }
        }elseif(is_file($path)){
                $fileSize+=filesize($path);
        }
    
        return $fileSize;
    }
    

    function format_size($size){
        $metrics[0] = 'bites';
        $metrics[1] = 'Kb';
        $metrics[2] = 'Mb';
        $metrics[3] = 'Gb';
        $metrics[4] = 'Tb';
        $metric = 0;         
        while(floor($size/1024) > 0){
            ++$metric;
            $size /= 1024;
        }        
        $ret =  round($size,1)." ".(isset($metrics[$metric])?$metrics[$metric]:'??');
        return $ret;
    }

   
?>
<p></p>
<a href="../folderWeightPage.php" style="color:blue">Вернуться назад</a>
</div>

<?php require('footer.php') ?>

