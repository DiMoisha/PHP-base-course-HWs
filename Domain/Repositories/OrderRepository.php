<?php
    function CreateOrder($order) {
        if ($_COOKIE['loginuserid']) {
            $userId = intval($_COOKIE['loginuserid']);
            $orderSum = 0;
            require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";

            $sql = "SELECT SUM(`sm`) AS `sm` FROM `cart` WHERE `userid`=$userId AND `orderstatusid`=1";
            $result = mysqli_query($dbContext, $sql);
            if(!$result){
                die(mysqli_error($dbContext));
            }

            $reccount = mysqli_num_rows($result);

            if ($reccount > 0) {
                $row = mysqli_fetch_assoc($result);
                $orderSum = $row['sm'];
            }

            $sql = "INSERT INTO `orders`(`userid`, `custname`, `custtel`, `custemail`, `contactperson`, `isdelivery`, `deliveryadress`, `isonlinepay`, `ordernote`, `ordersum`) VALUES (%u, '%s', '%s', '%s', '%s', %u, '%s', %u, '%s', %f)";
            $query = sprintf($sql,  $userId,
                                    mysqli_real_escape_string($dbContext, $order -> custName), 
                                    mysqli_real_escape_string($dbContext, $order -> custTel),
                                    mysqli_real_escape_string($dbContext, $order -> custEmail),
                                    mysqli_real_escape_string($dbContext, $order -> contactPerson),
                                    $order -> isDelivery,
                                    mysqli_real_escape_string($dbContext, $order -> deliveryAdress),
                                    $order -> isOnlinePay,
                                    mysqli_real_escape_string($dbContext, $order -> orderNote),
                                    $orderSum);
            $result = mysqli_query($dbContext, $query);
            if(!$result){
                die(mysqli_error($dbContext));
            }
    
            if($result > 0) {
                return (int)mysqli_insert_id($dbContext);
            }

            return 0;
        }
        
        return 0;
    }

    function GetList() {
        if ($_COOKIE['loginuserid'] && $_COOKIE['loginroleid']) {
            $userId = intval($_COOKIE['loginuserid']);
            $userRoleId = intval($_COOKIE['loginroleid']);

            include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
            require_once LOCAL_PATH_ROOT."/Domain/Models/OrderModels.php";

            $sql = "SELECT o.orderid, o.orderstatusid, o.custname, o.custtel, o.custemail, ";
            $sql .= "o.contactperson, o.isdelivery, o.isonlinepay, o.ordersum, o.deliverysum, o.insdate, ";
            $sql .= "o.ordernote, o.deliveryadress, s.status ";
            $sql .= "FROM `orders` `o` INNER JOIN `orderstatus` `s` ON o.orderstatusid = s.orderstatusid ";
            $sql .= "WHERE ".($userRoleId == 2 ? "o.userid = $userId AND " : "")."o.orderstatusid > 1 ORDER BY o.orderid";
            
            $result = $dbContext -> query($sql);
            if(!$result){
                die(mysqli_error($dbContext));
            }

            $reccount = mysqli_num_rows($result);
            $orders = [];
            
            if ($reccount > 0) {
                for($i = 0; $i < $reccount; $i ++) {
                    $row = mysqli_fetch_assoc($result);
                    $order = new OrderViewModel;
                    $order -> Set($row['orderid'], $row['orderstatusid'], $row['status'], $row['custname'], $row['custtel'], $row['custemail'], $row['contactperson'],
                        $row['isdelivery'], $row['deliveryadress'], $row['deliverysum'], $row['isonlinepay'], $row['ordersum'], $row['ordernote'], $row['insdate']);
                    $order -> SetOrderDetails(GetOrderDetails($row['orderid']));
                    $orders[] = $order;
                }
            }
            
            return $orders;
        }
        return [];
    }

    function GetOrder($orderId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/OrderModels.php";

        $sql = "SELECT o.orderid, o.orderstatusid, o.custname, o.custtel, o.custemail, ";
        $sql .= "o.contactperson, o.isdelivery, o.isonlinepay, o.ordersum, o.deliverysum, o.insdate, ";
        $sql .= "o.ordernote, o.deliveryadress, s.status ";
        $sql .= "FROM `orders` `o` INNER JOIN `orderstatus` `s` ON o.orderstatusid = s.orderstatusid ";
        $sql .= "WHERE o.orderid = $orderId";
        
        $result = $dbContext -> query($sql);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);

        if ($reccount > 0) {
            $row = mysqli_fetch_assoc($result);
            $order = new OrderViewModel;
            $order -> Set($row['orderid'], $row['orderstatusid'], $row['status'], $row['custname'], $row['custtel'], $row['custemail'], $row['contactperson'],
                $row['isdelivery'], $row['deliveryadress'], $row['deliverysum'], $row['isonlinepay'], $row['ordersum'], $row['ordernote'], $row['insdate']);
            $order -> SetOrderDetails(GetOrderDetails($orderId));
            return $order;
        }
        return 0;
    }

    function GetOrderDetails($orderId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        require_once LOCAL_PATH_ROOT."/Domain/Models/OrderModels.php";
        
        $sql = "SELECT d.orderdetailid, d.orderid, d.productid, d.price, d.quantity, d.sm, p.unit, p.productname ";
        $sql .= "FROM `orderdetails` `d` INNER JOIN `products` `p` ON d.productid = p.productid ";
        $sql .= "WHERE d.orderid = $orderId ORDER BY d.orderdetailid";

        $result = $dbContext -> query($sql);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        $reccount = mysqli_num_rows($result);
        $items = [];

        if ($reccount > 0) {
            for($i = 0; $i < $reccount; $i ++) {
                $row = mysqli_fetch_assoc($result);
                $item = new OrderDetailModel;
                $item -> Set($row['orderdetailid'], $row['orderid'], $row['productid'], $row['productname'], $row['unit'], $row['price'], $row['quantity'], $row['sm']);
                $items[] = $item;
            }
        }    
        return $items;
    }

    function EditOrder($order) {
        require_once LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $sql = "UPDATE `orders` SET `orderstatusid`=%u,`custname`='%s',`custtel`='%s',`custemail`='%s',";
        $sql .= "`contactperson`='%s',`isdelivery`=%u,`isonlinepay`=%u,`ordersum`=%f,`deliverysum`=%f,";
        $sql .= "`ordernote`='%s',`deliveryadress`='%s'";
        $sql .= "WHERE `orderid`=%u";

        $query = sprintf($sql,  $order -> orderStatusId,
                                mysqli_real_escape_string($dbContext, $order -> custName), 
                                mysqli_real_escape_string($dbContext, $order -> custTel),
                                mysqli_real_escape_string($dbContext, $order -> custEmail),
                                mysqli_real_escape_string($dbContext, $order -> contactPerson),
                                $order -> isDelivery,
                                $order -> isOnlinePay,
                                $order -> orderSum,
                                $order -> deliverySum,
                                mysqli_real_escape_string($dbContext, $order -> orderNote),
                                mysqli_real_escape_string($dbContext, $order -> deliveryAdress),
                                $order -> orderId);

        $result = mysqli_query($dbContext, $query);
        if(!$result){
            die(mysqli_error($dbContext));
        }

        if($result > 0) {
            // UPDATE Details
        }
 
        return $result;
    }

    // function EditOrderDetail($orderDetail) {
    //     if ($_COOKIE['loginuserid']) {
    //         $userId = intval($_COOKIE['loginuserid']);
    //     }
    //     return 0;     
    // }

    function SetCancelOrder($orderId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $result = mysqli_query($dbContext, "UPDATE `orders` SET `orderstatusid` = 5 WHERE `orderid` = $orderId");
        if(!$result){
            die(mysqli_error($dbContext));
        }
        return $result;
    }

    function SetOrderStatus($orderId, $orderStatusId) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $result = mysqli_query($dbContext, "UPDATE `orders` SET `orderstatusid` = $orderStatusId WHERE `orderid` = $orderId");
        if(!$result){
            die(mysqli_error($dbContext));
        }
        return $result;
    } 

    function SetOrderDeliverySum($orderId, $deliverySum) {
        include LOCAL_PATH_ROOT."/Domain/Context/DBContext.php";
        $result = mysqli_query($dbContext, "UPDATE `orders` SET `deliverysum` = $deliverySum WHERE `orderid` = $orderId");
        if(!$result){
            die(mysqli_error($dbContext));
        }
        return $result;
    } 

    // function RemoveOrder($orderId) {
    //     if ($_COOKIE['loginuserid']) {
    //         $userId = intval($_COOKIE['loginuserid']);
    //     }
    //     return 0;
    // }

    // function RemoveOrderDetail($orderDetailId) {
    //     if ($_COOKIE['loginuserid']) {
    //         $userId = intval($_COOKIE['loginuserid']);
    //     }
    //     return 0;
    // }

    
    // SELECT `orderdetailid`, `orderid`, `cartid`, `productid`, `price`, `quantity`, `sm` FROM `orderdetails` WHERE 1

    
        
    // SELECT `orderid`, `userid`, `orderstatusid`, `custname`, `custtel`, `custemail`,
    // `contactperson`, `isdelivery`, `isonlinepay`, `ordersum`, `deliverysum`, `insdate`, 
    // `ordernote`, `deliveryadress` FROM `orders` WHERE 1
