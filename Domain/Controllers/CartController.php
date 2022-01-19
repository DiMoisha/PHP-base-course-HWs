<?php
    function Index() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
            require_once LOCAL_PATH_ROOT."/Domain/Views/Cart/Index.php";
            CartProductTotal();
            return IndexView(GetCart());
        } else {
            header('Location: /login');
        }
    }

    function AddProduct($productId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
            if(AddItem($productId) < 1) {
                echo '<b>Не удалось добавить товар в корзину! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/products" title="На страницу продукции">« На страницу продукции</a>';
                exit();
            } else {
                CartProductTotal();
                header('Location: /cart');
            }
        } else {
            header('Location: /login');
        }
    }

    function RecalcProduct($productId, $quantity) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
            if(RecalcItem($productId, $quantity) < 1) {
                echo '<b>Не удалось пересчитать товар в корзине! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/cart" title="В корзину">« В корзину</a>';
                exit();
            } else {
                CartProductTotal();
                header('Location: /cart');
            }
        } else {
            header('Location: /login');
        }
    }

    function RemoveProduct($productId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
            
            if(RemoveItem($productId) < 1) {
                echo '<b>Не удалось удалить товар из корзины! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/products" title="На страницу продукции">« На страницу продукции</a>';
                exit();
            } else {
                CartProductTotal();
                header('Location: /cart');
            }
        } else {
            header('Location: /login');
        }
    }

    function CartProductTotal() {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
        $cartProductsTotal = GetCartProductsTotal();
        if ($cartProductsTotal > 0) {
            setcookie('cartprodtotal', (string)$cartProductsTotal, time() + 3600, "/");
        } else {
            setcookie('cartprodtotal', "", time() - 3600, "/");
        }
    }