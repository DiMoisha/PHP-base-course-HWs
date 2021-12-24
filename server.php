<?php
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
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
            if($fileSize > 2*1024*1024)
            {
                echo $fileName." имеет слишком большой размер! Выберите файл до 2Мб!";
            }
            else
            {
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $img)){
                    if (resize_image_w($img, $thumb, 200, $extension)) {
                        include "dbconfig.php";
                        $sql = "INSERT INTO images (imagename, imagetype, imagesize, imagelocation, datecreate) VALUES ('$fileName', '$extension', $fileSize, '$img', NOW())";
                        if(mysqli_query($dbconn, $sql)){
                            header("Location: loadsuccess.php?filename=$fileName");
                        } else { 
                            header("Location: index.php");
                        }
                    }
                }
            }
        }
    }

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
?>