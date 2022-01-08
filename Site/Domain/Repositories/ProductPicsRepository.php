<?php
    function GetPics($productId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/ProductModels.php";
        $result = $dbContext -> query("SELECT `productid`, `picname` FROM `productpics` WHERE `productid` = $productId ORDER BY `productPicId`");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);
        $pics = [];

        if ($reccount > 0) {
            for($i = 0; $i < $reccount; $i ++) {
                $row = mysqli_fetch_assoc($result);
                $pics[] = (new ProductPicModel) -> Set($row['productid'], $row['picname']);
            }
        }

        return $pics;
    }

    function AddPics($productPics) {
        if (count($productPics) > 0) {
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
            foreach ($productPics as $pic) {
                $sql = "INSERT INTO `productpics`(productid, picname) VALUES (%s,'%s');";
                $query = sprintf($sql, $pic->productId, mysqli_real_escape_string($dbContext, $pic->picName));
                $result = mysqli_query($dbContext, $query);
                if(!$result){
                    die(mysqli_error($dbContext));
                }
            }
        }

        return true;
    }

    function RemovePics($productId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $result = $dbContext -> query("DELETE FROM `productpics` WHERE `productid` = $productId");
        if(!$result){
            die(mysqli_error($dbContext));
        }
    }