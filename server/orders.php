<?php
    require_once "../config.php";
    require_once LOCAL_PATH_ROOT."/Domain/Models/OrderModels.php";

    $action = filter_var(trim($_POST['Action']), FILTER_SANITIZE_STRING);
    $returnUrl = filter_var(trim($_POST['ReturnUrl']), FILTER_SANITIZE_STRING);

    if ($action == "checkout") {
        $deliveryAdress = filter_var(trim($_POST['DeliveryAdress']), FILTER_SANITIZE_STRING);
        $custName       = filter_var(trim($_POST['CustName']), FILTER_SANITIZE_STRING);
        if(mb_strlen($custName) < 3 || mb_strlen($custName) > 250) {
            echo '<b>Недопустимая длина заказчика! Должна быть от 3 до 250 символов!</b><br><hr class="bhr"><br><a href="'.$returnUrl.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }
        $custTel        = filter_var(trim($_POST['CustTel']), FILTER_SANITIZE_STRING);
        $custEmail      = filter_var(trim($_POST['CustEmail']), FILTER_SANITIZE_STRING);
        if(mb_strlen($custEmail) < 10 || mb_strlen($custEmail) > 150) {
            echo '<b>Недопустимая длина e-mail! E-mail должен быть от 10 до 150 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }
        $contactPerson  = filter_var(trim($_POST['ContactPerson']), FILTER_SANITIZE_STRING);
        if(mb_strlen($contactPerson) > 150) {
            echo '<b>Недопустимая длина контакного лица! Должен быть до 150 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }
        $orderNote      = filter_var(trim($_POST['OrderNote']), FILTER_SANITIZE_STRING);
        $isDelivery     = filter_var(trim($_POST['IsNotDelivery']), FILTER_SANITIZE_STRING) == "on" ? 0: 1;
        $isOnLinePay    = filter_var(trim($_POST['IsOnLinePay']), FILTER_SANITIZE_STRING) == "on" ? 1 : 0;
    }

    $order = new OrderModel;
    $order -> Set(null, null, null, $custName, $custTel, $custEmail, $contactPerson, $isDelivery, $deliveryAdress , null, $isOnlinePay, null, $orderNote, null);

    require_once LOCAL_PATH_ROOT."/Domain/Controllers/OrderController.php";

    if ($action == 'checkout') {
       Checkout($order);

    //    echo $order -> custName;
    //    echo "<br>";
    //    echo $order -> custTel;
    //    echo "<br>";
    //    echo $order -> custEmail;
    //    echo "<br>";
    //    echo $order -> contactPerson;
    //    echo "<br>";
    //    echo $order -> isDelivery;
    //    echo "<br>";
    //    echo $order -> isOnlinePay;
    //    echo "<br>";
    //    echo $order -> orderNote;

    //    print_r($order);
    } 
    //else if ($action == 'recalc') {
    //     RecalcProduct($productId, $quantity);
    // } else if ($action == 'remove') {
    //     RemoveProduct($productId);
    // }