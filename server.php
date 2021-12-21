<?php
    //print_r($_FILES); --выводит массив с инфой об upload файлах

    $fileName = $_FILES['photo']['name'];
    $img = "images/".$fileName;
    $thumb = "thumbnails/".$fileName;
    $explode = explode(".", $fileName);
    $extension = $explode[sizeof($explode) - 1];

    if(!in_array($extension, ["png", "jpg", "jpeg"])){
        echo $fileName." имеет неверный формат!";
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
        $allowed_mime_types = ["image/jpg", "image/jpeg", "image/png"];
        if(!in_array($mime, $allowed_mime_types)){
            echo $fileName." имеет неверный формат!";
        } else {
            if($_FILES['photo']['size'] > 2*1024*1024)
            {
                echo $fileName." имеет слишком большой размер! Выберите файл до 2Мб!";
            }
            else
            {
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $img)){
                    if (resize_image_w($img, $thumb, 200, $extension)) {
                        echo $fileName." успешно загружен!";
                    }
                }
            }
        }
    }

    //header("Location: ".$_SERVER['HTTP_REFERER']);

    // Моя функция ресайза по ширине и сохранение в новый файл с проверкой типа
    function resize_image_w($file, $newfile, $w, $type = "jpg") {
        list($width, $height) = getimagesize($file);
        $k = $width / $height;
  
        $newwidth = $w;
        $newheight = $w / $k;
        
        if ($type == "png") {
            $src = imagecreatefrompng($file);
        } else {
            $src = imagecreatefromjpeg($file);
        }
        
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
        if ($type == "png") {
            imagepng($dst, $newfile);
        } else {
            imagejpeg($dst, $newfile, 80);
        }

        imagedestroy($dst);

        return true;
    }

    // Функция ресайза с кропом из яндекса
    function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        return $dst;
    }
    //$img = resize_image(‘/path/to/some/image.jpg’, 200, 200);
?>
<br><hr><br>
<a href="/" title="На главную" style="background:#ddd; padding: 5px 20px;">
<< на главную
</a>
