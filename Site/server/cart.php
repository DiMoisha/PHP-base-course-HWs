<?php
    require_once "../config.php";
    $action = filter_var(trim($_POST['Action']), FILTER_SANITIZE_STRING);
    $returnUrl = filter_var(trim($_POST['ReturnUrl']), FILTER_SANITIZE_STRING);
    $productId = filter_var(trim($_POST['ProductId']), FILTER_SANITIZE_NUMBER_INT);
    require_once LOCAL_PATH_ROOT."/Domain/Controllers/CartController.php";

    if ($action == 'add') {
        AddProduct($productId);
    } else if ($action == 'remove') {
        RemoveProduct($productId);
    } else if ($action == 'recalc') {
        header('Location: /cart');
    }
    