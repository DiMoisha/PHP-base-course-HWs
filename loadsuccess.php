<?php
	$pageTitle   = 'Фотогалерея | Файл успешно загружен';
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
<?php
if($_GET['filename']):
?>
    <h1 class="h1">Файл <?= $_GET['filename']?> успешно загружен!</h1>
<?php
    endif;
?>
    <main class="main-content text-center">
        <div>
            <a href="/" title="На главную" class="btn"><< на главную</a>
        </div>
    </main>
    <footer class="footer">
        <p>Copyright &copy; <?= $footerYear ?>  <em>Photogallery</em> &middot; Design: Dm Karr</p>
    </footer>
</body>
</html>