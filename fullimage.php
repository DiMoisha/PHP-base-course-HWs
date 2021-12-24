<?php
	$pageTitle   = 'Фотогалерея | Просмотр изображения';
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
    include "dbconfig.php";

    if($_GET['id']):
        $sql = "UPDATE images SET viewcount=viewcount+1 WHERE imageid=".$_GET['id'];
        mysqli_query($dbconn, $sql);

        $sql = "SELECT imageid, imagelocation, imagename, viewcount FROM images WHERE imageid=".$_GET['id'];
        $res = mysqli_query($dbconn, $sql);
        while($data = mysqli_fetch_assoc($res)) {
?>
    <h1 class="h1">Исходное изображение</h1>
    <main class="main-content text-center">
        <img src="<?= $data['imagelocation']?>" alt="Изображение <?= $data['imagename']?>" class="img-full">
        <p class="img-counter">Количество просмотров <b><?= $data['viewcount']?></b></p>
        <div>
            <a href="/" title="На главную" class="btn"><< на главную</a>
        </div>
    </main>
    
<?php
    } endif;
?>
    <footer class="footer">
        <p>Copyright &copy; <?= $footerYear ?>  <em>Photogallery</em> &middot; Design: Dm Karr</p>
    </footer>
</body>
</html>