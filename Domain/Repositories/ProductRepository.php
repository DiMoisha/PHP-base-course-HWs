<?php 
    function GetList() {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/ProductModels.php";

        $result = $dbContext -> query("SELECT `productid`, `productname`, `unit`, `price` FROM `products` ORDER BY `productname`");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);
        $products = [];

        for($i = 0; $i < $reccount; $i ++) {
            $row = mysqli_fetch_assoc($result);
            $products[] = (new ProductShortViewModel) -> Set($row['productid'], $row['productname'], $row['unit'], $row['price']);
        }

        return $products;
    }

    function CreateProduct($product) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductPicsRepository.php";
        $sql = "INSERT INTO `products`(`productname`, `descr`, `unit`, `price`, `html_pg_title`, `html_mt_descr`, `html_mt_kwrds`) VALUES ('%s','%s','%s',%f,'%s','%s','%s')";
        $query = sprintf($sql, mysqli_real_escape_string($dbContext, $product -> product -> productName), 
                                mysqli_real_escape_string($dbContext, $product -> product -> descr),
                                mysqli_real_escape_string($dbContext, $product -> product -> unit),
                                $product -> product -> price,
                                mysqli_real_escape_string($dbContext, $product -> product -> html_pg_title),
                                mysqli_real_escape_string($dbContext, $product -> product -> html_mt_descr),
                                mysqli_real_escape_string($dbContext, $product -> product -> html_mt_kwrds));
        $result = mysqli_query($dbContext, $query);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        if($result > 0) {
            $product -> SetProductId((int)mysqli_insert_id($dbContext));
            if (count($product -> productPics) > 0) {
                AddPics($product -> productPics);
            }
        }

        return $result;
    }

    function GetProduct($productId) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/ProductModels.php";
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductPicsRepository.php";
        $sql = "SELECT `productid`, `productname`, `descr`, `unit`, `price`, `html_pg_title`, `html_mt_descr`, `html_mt_kwrds` FROM `products` WHERE `productid`=$productId";
        $result = $dbContext -> query($sql);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);
        $product = new ProductViewModel;

        if ($reccount > 0) {
            $row = mysqli_fetch_assoc($result);
            $product -> SetProduct((new ProductModel) -> Set($row['productid'], $row['productname'], $row['descr'], $row['unit'], $row['price'], $row['html_pg_title'], $row['html_mt_descr'], $row['html_mt_kwrds']));
            $product -> SetProductPics(GetPics($productId));
        }

        return $product;
    }

    function EditProduct($product) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductPicsRepository.php";
        $sql = "UPDATE `products` SET `productname`='%s',`descr`='%s',`unit`='%s',`price`=%f,`html_pg_title`='%s',`html_mt_descr`='%s',`html_mt_kwrds`='%s' WHERE `productid`=%u";
        $query = sprintf($sql, mysqli_real_escape_string($dbContext, $product -> product -> productName), 
                                mysqli_real_escape_string($dbContext, $product -> product -> descr),
                                mysqli_real_escape_string($dbContext, $product -> product -> unit),
                                $product -> product -> price,
                                mysqli_real_escape_string($dbContext, $product -> product -> html_pg_title),
                                mysqli_real_escape_string($dbContext, $product -> product -> html_mt_descr),
                                mysqli_real_escape_string($dbContext, $product -> product -> html_mt_kwrds),
                                $product -> product -> productId
                            );
        $result = mysqli_query($dbContext, $query);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        if($result > 0) {
            RemovePics($product -> product -> productId);

            if (count($product -> productPics) > 0) {
                AddPics($product -> productPics);
            }
        }
 
        return $result;
    }

    function RemoveProduct($productId) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductPicsRepository.php";
        RemovePics($productId);
        $result = $dbContext -> query("DELETE FROM `products` WHERE `productid` = $productId");
        if(!$result){
            die(mysqli_error($dbContext));
        }

        return $result;
    }