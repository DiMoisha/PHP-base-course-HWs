<!--
    Урок 4. Работа с файлами
    1. Создать галерею фотографий. Она должна состоять всего из одной странички, 
        на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. 
        При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с 
        помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
    2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес 
        папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
    3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение в 
        модальном окне (материал в помощь: http://dontforget.pro/javascript/prostoe-modalnoe-okno-na-jquery-i-css-bez-plaginov/)
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
</head>
<body>
    <header style="background:#ddd;padding:10px;text-align:center;font-size:18px;border-bottom:4px solid orange;font-weight:bold;">
        <p>
            Урок 4. Работа с файлами
        </p>
    </header>
    <main style="min-height:80vh;">
        <h1 style="background:linear-gradient(to right, #555, #FFFFE0);color:white;padding:5px 20px;letter-spacing: 0.9em;"><?= $pageHeading ?></h1>
        <div style="display:grid;grid-gap:50px 10px;grid-template-rows:auto;grid-template-columns: repeat(5,1fr);align-items:center;justify-content:center;margin: 30px auto;">
            <?php include "scan.php"; ?>
        </div>
        <div style="margin: 20px 0;background:linear-gradient(to right, #555, #FFFFE0);">
            <?php include "form.html"; ?>
        </div>
    </main>
    <footer style="background:#888;padding:10px;text-align:center;font-size:14px;color:#ccc;border-top:4px solid orange;">
        <p>Copyright &copy; <?= $footerYear ?>  <em>Photogallery</em> &middot; Design: Dm Karr</p>
    </footer>
</body>
</html>