<?php
    function Index() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Views/Account/Index.php";
            return IndexView();
        } else {
            header('Location: /');
        }
    }

    function GetLogin() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Account/Login.php";
        return LoginView();
    }

    function Login($login, $password, $isRememberMe) {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/AccountRepository.php";
        
        [$userResult, $userId, $userName, $userEmail, $userRoleId, $userRole] = CheckLogin($login, $password);

        if($userResult < 2) {
            echo '<b>Логин или пароль введены неверно!</b><br><hr class="bhr"><br><a href="/login" title="Вернуться на страницу авторизации">« Вернуться на предыдущую страницу</a>';
            exit();
        } else {
            if ($isRememberMe == 1) {
                setcookie('login', $login, time() + (365 * 24 * 3600), "/");
            } else {
                setcookie('login', $login, time() - 3600, "/");
            }
            setcookie('loginlogin', $login, time() + 3600, "/");
            setcookie('loginuserid', (string)$userId, time() + 3600, "/");
            setcookie('loginuser', $userName, time() + 3600, "/");
            setcookie('loginemail', $userEmail, time() + 3600, "/");
            setcookie('loginroleid', (string)$userRoleId, time() + 3600, "/");
            setcookie('loginrole', $userRole, time() + 3600, "/");

            require_once LOCAL_PATH_ROOT."/Domain/Repositories/CartRepository.php";
            $cartProductsTotal = GetCartProductsTotal($userId);
            if ($cartProductsTotal > 0) {
                setcookie('cartprodtotal', (string)$cartProductsTotal, time() + 3600, "/");
            }

            header('Location: /lk');
        }
    }

    function GetRegister() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Account/Register.php";
        return RegisterView();
    }

    function Register($login, $password, $userName, $email) {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/AccountRepository.php";
        [$userResult, $userId, $userName, $email, $userRoleId, $userRole] = RegisterLogin($login, $password, $userName, $email);

        if($userResult < 0) {
            echo '<b>Такой логин уже есть!</b><br><hr class="bhr"><br><a href="/register" title="Вернуться на страницу регистрации">« Вернуться на предыдущую страницу</a>';
            exit();
        } else if(($userResult > 0 && $userResult < 2) || $userId < 1) {
            echo '<b>Не удалось зарегистрировать учетную запись! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/register" title="Вернуться на страницу регистрации">« Вернуться на предыдущую страницу</a>';
            exit();
        } else {
            header('Location: /login');
        }
    }

    function LogOff() {
        setcookie('loginlogin', "", time() - 3600, "/");
        setcookie('loginuserid', "", time() - 3600, "/");
        setcookie('loginuser', "", time() - 3600, "/");
        setcookie('loginemail', "", time() - 3600, "/");
        setcookie('loginroleid', "", time() - 3600, "/");
        setcookie('loginrole', "", time() - 3600, "/");
        setcookie('cartprodtotal', "", time() - 3600, "/");
        header('Location: /');
    }

    function GetRemove() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Views/Account/Remove.php";
            return RemoveView();
        } else {
            header('Location: /');
        }
    }

    function Remove($login, $password) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/AccountRepository.php";
            if(RemoveLogin($login, $password) < 1) {
                echo '<b>Не удалось удалить учетную запись! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/lk" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
                exit();
            } else {
                LogOff();
            }
        }
        header('Location: /');
    }