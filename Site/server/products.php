<?php
    require_once "../config.php";
    require_once LOCAL_PATH_ROOT."/Domain/Models/ProductModels.php";

    $action = filter_var(trim($_POST['Action']), FILTER_SANITIZE_STRING);
    $returnUrl = filter_var(trim($_POST['ReturnUrl']), FILTER_SANITIZE_STRING);
    $productId = $action == 'edit' ? filter_var(trim($_POST['ProductId']), FILTER_SANITIZE_NUMBER_INT) : null;
    $productName = filter_var(trim($_POST['ProductName']), FILTER_SANITIZE_STRING);
    if(mb_strlen($productName) < 3 || mb_strlen($productName) > 250) {
        echo '<b>Недопустимая длина наименования товара! Должна быть от 3 до 250 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    $unit = filter_var(trim($_POST['Unit']), FILTER_SANITIZE_STRING);
    if(mb_strlen($unit) > 60) {
        echo '<b>Недопустимая длина единицы измерения товара! Должна быть до 60 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    $price = floatval(filter_var(trim($_POST['Price']), FILTER_SANITIZE_STRING));
    if($price < 0) {
        echo '<b>Неверная цена товара!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    $descr = trim($_POST['Descr']);
    $html_pg_title = filter_var(trim($_POST['Html_Pg_Title']), FILTER_SANITIZE_STRING);
    if(mb_strlen($html_pg_title) > 250) {
        echo '<b>Недопустимая длина заголовка страницы товара! Должна быть до 250 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    $html_mt_descr = filter_var(trim($_POST['Html_Mt_Descr']), FILTER_SANITIZE_STRING);
    if(mb_strlen($html_mt_descr) > 250) {
        echo '<b>Недопустимая длина описание страницы товара! Должна быть до 250 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    $html_mt_kwrds = filter_var(trim($_POST['Html_Mt_Kwrds']), FILTER_SANITIZE_STRING);
    if(mb_strlen($html_mt_kwrds) > 250) {
        echo '<b>Недопустимая длина ключевые слова страницы товара! Должна быть до 250 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    if ($action == 'edit') {
        $picName1 = filter_var(trim($_POST['picName1']), FILTER_SANITIZE_STRING);
        $picName2 = filter_var(trim($_POST['picName2']), FILTER_SANITIZE_STRING);
        $picName3 = filter_var(trim($_POST['picName3']), FILTER_SANITIZE_STRING);
        $picName4 = filter_var(trim($_POST['picName4']), FILTER_SANITIZE_STRING);
        $picName5 = filter_var(trim($_POST['picName5']), FILTER_SANITIZE_STRING);
        $delPic1 = $_POST['delPic1'];
        $delPic2 = $_POST['delPic2'];
        $delPic3 = $_POST['delPic3'];
        $delPic4 = $_POST['delPic4'];
        $delPic5 = $_POST['delPic5'];
    }
    $pic1 = $_FILES['uploadPic1'];
    $pic2 = $_FILES['uploadPic2'];
    $pic3 = $_FILES['uploadPic3'];
    $pic4 = $_FILES['uploadPic4'];
    $pic5 = $_FILES['uploadPic5'];

    $product = new ProductViewModel;
    $product -> SetProduct((new ProductModel) -> Set($productId, $productName, $descr, $unit, $price, $html_pg_title, $html_mt_descr, $html_mt_kwrds));

    for($i = 1; $i < 6; $i++) {
        switch ($i) {
            case 1:
                $pic = $pic1;
                if ($action == 'edit') {
                    $delPic = $delPic1;
                    $exPicName = $picName1;
                }
                break;
            case 2:
                $pic = $pic2;
                if ($action == 'edit') {
                    $delPic = $delPic2;
                    $exPicName = $picName2;
                }
                break;
            case 3:
                $pic = $pic3;
                if ($action == 'edit') {
                    $delPic = $delPic3;
                    $exPicName = $picName3;
                }
                break;
            case 4:
                $pic = $pic4;
                if ($action == 'edit') {
                    $delPic = $delPic4;
                    $exPicName = $picName4;
                }
                break;
            case 5:
                $pic = $pic5;
                if ($action == 'edit') {
                    $delPic = $delPic5;
                    $exPicName = $picName5;
                }
                break;
        }
      
        if ($pic && isset($pic['name']) && !empty($pic['name'])) {
            $picName = $pic['name'];
            $fileSize = $pic['size'];
            $img = LOCAL_PATH_ROOT."/images/products/".$picName;
            $thumb = LOCAL_PATH_ROOT."/images/products/thumbnails/".$picName;
            $explode = explode(".", $picName);
            $extension = $explode[sizeof($explode) - 1];
        
            if(in_array($extension, ["png", "gif", "jpg", "jpeg"])) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $pic['tmp_name']);
                $allowed_mime_types = ["image/jpg", "image/jpeg", "image/gif", "image/png"];
                if(in_array($mime, $allowed_mime_types)) {
                    if($fileSize < 3*1024*1024) {
                        if(move_uploaded_file($pic['tmp_name'], $img)) {
                            if (resize_image($img, $thumb, 120, 90, $extension)) {
                                $product -> AddPic((new ProductPicModel) -> Set($productId, $picName));
                                continue;
                            }
                        }
                    }
                }
            }
        } else {
            if ($action == 'edit') {
                if ((!$delPic || $delPic == false) && $exPicName && !empty($exPicName)) {
                    $product -> AddPic((new ProductPicModel) -> Set($productId, $exPicName));
                }
            }
        }
    }

    require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";

    if ($action == "create") {
        Create($product);
    } 
    else if ($action == "edit") {
        Edit($product);
    } else {
        header('Location: /');
    }

    function resize_image($file, $newfile, $w, $h, $type = "jpg") {
        list($width, $height) = getimagesize($file);
       
        if ($type == "png") {
            $src = imagecreatefrompng($file);
        } else if ($type == "gif") {
            $src = imagecreatefromgif($file);
        } else {
            $src = imagecreatefromjpeg($file);
        }

        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        
        if ($type == "png") {
            imagepng($dst, $newfile);
        } else if ($type == "gif") {
            imagegif($dst, $newfile);
        } else {
            imagejpeg($dst, $newfile, 80);
        }

        imagedestroy($dst);

        return true;
    }