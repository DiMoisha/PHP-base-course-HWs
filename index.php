<!--
    Урок 5. Базы данных MySQL и работа с ними на уровне PHP
    1. Создать галерею изображений, состоящую из двух страниц:
    просмотр всех фотографий (уменьшенных копий);
    просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
    2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
    3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
    4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.
-->
<?php
	$pageTitle   = 'Фотогалерея | Главная';
    $pageHeading = 'ФОТОГАЛЕРЕЯ';
	$footerYear = date('Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Dm Karr" />
	<title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <p>
            Урок 5. Базы данных MySQL и работа с ними на уровне PHP
        </p>
    </header>
    <main class="main-content">
        <h1 class="h1"><?= $pageHeading ?></h1>
        <div class="img-list">
            <?php include "gallery.php"; ?>
        </div>
        <div class="img-form-wrap">
            <?php include "form.html"; ?>
        </div>
    </main>
    <footer class="footer">
        <p>Copyright &copy; <?= $footerYear ?>  <em>Photogallery</em> &middot; Design: Dm Karr</p>
    </footer>
</body>
</html>