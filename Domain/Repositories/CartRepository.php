<?php
    function GetCart() {
        if ($_COOKIE['loginuserid']) {
            $userId = intval($_COOKIE['loginuserid']);
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
            require_once LOCAL_PATH_ROOT."/Domain/Models/CartModels.php";
            
            $sql = "SELECT c.userid, c.quantity, c.price, c.sm, s.status, p.productid, p.productname, p.unit ";
            $sql .= "FROM `cart` `c` INNER JOIN `products` `p` ON c.productid = p.productid ";
            $sql .= "INNER JOIN `orderstatus` `s` ON c.orderstatusid = s.orderstatusid ";
            $sql .= "WHERE c.userid = $userId AND c.orderstatusid = 1 ORDER BY p.productname";
            $result = $dbContext -> query($sql);
            if(!$result){
                die(mysqli_error($dbContext));
            }

            $reccount = mysqli_num_rows($result);
            $cart = new CartViewModel;
            
            for($i = 0; $i < $reccount; $i ++) {
                $row = mysqli_fetch_assoc($result);
                if ($i == 0) {
                    $cart -> SetUserId($userid);
                    $cart -> SetStatus($status);
                }

                $cart -> AddItem((new CartItemModel) -> Set($row['productid'], $row['productname'], $row['unit'], $row['price'], $row['quantity'], $row['sm']));
            }
            
            return $cart;
        }
        
        return null;
    }

    function AddItem($productId) {
        if ($_COOKIE['loginuserid']) {
            $userId = intval($_COOKIE['loginuserid']);
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

            $sql = "SELECT `cartid` FROM `cart` WHERE `productid` = $productId AND `userid` = $userId AND `orderstatusid` = 1";
            $result = mysqli_query($dbContext, $sql);
            if(!$result){
                die(mysqli_error($dbContext));
            }
 
            $count = mysqli_num_rows($result);

            if ( $count > 0 ) {
                // Есть запись в корзине
                $sql = "UPDATE `cart` SET `quantity` = `quantity` + 1, `sm` = (`quantity` + 1)*`price` WHERE `productid` = $productId AND `userid` = $userId AND `orderstatusid` = 1";
                $result = mysqli_query($dbContext, $sql);
                if(!$result){
                    die(mysqli_error($dbContext));
                }
            } else {
                // нет данных
                $sql = "INSERT INTO `cart`(`productid`, `userid`, `quantity`, `price`, `sm`) VALUES ($productId, $userId, 1, ";
                $sql .= "(SELECT `price` FROM `products` WHERE `productid` = $productId), (SELECT `price` FROM `products` WHERE `productid` = $productId))";
                $result = mysqli_query($dbContext, $sql);
                if(!$result){
                    die(mysqli_error($dbContext));
                }
            }
            
            return $result;
        }
        
        return 0;
    }

    function RecalcItem($productId, $quantity) {
        if ($_COOKIE['loginuserid']) {
            $userId = intval($_COOKIE['loginuserid']);
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

            $sql = "UPDATE `cart` SET `quantity` = $quantity, `sm` = $quantity*`price` WHERE `productid`=$productId AND `userid`=$userId AND `orderstatusid` = 1";
            $result = mysqli_query($dbContext, $sql);
            if(!$result){
                die(mysqli_error($dbContext));
            }
            
            return $result;
        }
        
        return 0;
    }

    function RemoveItem($productId) {
        if ($_COOKIE['loginuserid']) {
            $userId = intval($_COOKIE['loginuserid']);
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

            $result = $dbContext -> query("DELETE FROM cart WHERE productid = $productId AND userid = $userId");
            if(!$result){
                die(mysqli_error($dbContext));
            }
    
            return $result;
        }

        return 0;
    }

    function GetCartProductsTotal($userId = null) : int {
        $cartProductsTotal = 0;

        if ($userId == null) {
            if ($_COOKIE['loginuserid']) {
                $userId = intval($_COOKIE['loginuserid']);
            }
        }

        if ($userId) {
            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
            $result = $dbContext -> query("SELECT COUNT(`cartid`) `cnt` FROM `cart` WHERE `userid` = $userId AND `orderstatusid` = 1 GROUP BY `userid`;");
            if(!$result){
                die(mysqli_error($dbContext));
            }

            $reccount = mysqli_num_rows($result);

            if ($reccount > 0) {
                $row = mysqli_fetch_assoc($result);
                $cartProductsTotal = $row['cnt'];
            }
        }

        return $cartProductsTotal;
    }