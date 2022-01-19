<?php
    function Index() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/OrderRepository.php";
            require_once LOCAL_PATH_ROOT."/Domain/Views/Orders/Index.php";
            return IndexView(GetList());
        } else {
            header('Location: /login');
        }
    }

    function GetCheckout() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Views/Orders/Checkout.php";
            return CheckoutView();
        } else {
            header('Location: /login');
        }
    }

    function Checkout($order) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/OrderRepository.php";
            $orderId = CreateOrder($order);

            if($orderId < 1) {
                echo '<b>Не удалось подтвердить заказ! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/checkout" title="Вернуться на страницу заказа">« Вернуться на предыдущую страницу</a>';
                exit();
            } else {
                setcookie('cartprodtotal', "", time() - 3600, "/");
                header("Location: /completed?orderid=$orderId");
            }
        } else {
            header('Location: /login');
        }
    }

    function Completed($orderId) {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Orders/Completed.php";
        return CompletedView($orderId);
    }

    function CancelOrder($orderId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/OrderRepository.php";

            if(SetCancelOrder($orderId) < 1) {
                echo '<b>Не удалось отменить заказ! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/orders" title="Вернуться на страницу заказов">« Вернуться на предыдущую страницу</a>';
                exit();
            } else {
                header("Location: /orders");
            }
        } else {
            header('Location: /login');
        }
    }
  
    function OrderStatus($orderId, $orderStatusId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']
        && intval($_COOKIE['loginroleid'])==1) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/OrderRepository.php";
            SetOrderStatus($orderId, $orderStatusId); 
            header("Location: /orders");
        } else {
            header('Location: /login');
        }
    }

    function OrderDeliverySum($orderId, $deliverySum) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']
        && intval($_COOKIE['loginroleid'])==1) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/OrderRepository.php";
            SetOrderDeliverySum($orderId, $deliverySum); 
            header("Location: /orders");
        } else {
            header('Location: /login');
        }
    }