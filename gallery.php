<?php
include "dbconfig.php";
// сортируем по просмотрам вниз, если картинки имеют одинаковые просмотры, то сортируем по датам вниз - т.е. картинка которую дергали последней - будет выше 
$res = mysqli_query($dbconn, "SELECT imageid, imagename FROM images ORDER BY viewcount DESC, datecreate DESC");

while($data = mysqli_fetch_assoc($res)) {
    $href = "fullimage.php?id=".$data['imageid'];
    $src = "thumbnails/".$data['imagename'];
    $descr = "Изображение ".$data['imagename'];
    ?>
    <a class="img-item" href="<?= $href?>" title="<?= $descr?>">
        <img class="img-item_thumb" src="<?= $src?>" width="200" alt="<?= $descr?>"/>
    </a>
<?php
}