<?php
    require_once "../config.php";
    $action = filter_var(trim($_POST['Action']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['Login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 3 || mb_strlen($login) > 90) {
        echo '<b>Недопустимая длина логина! Длина логина от 3 до 90 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }

    if(mb_strlen($password) < 3 || mb_strlen($password) > 20) {
        echo '<b>Недопустимая длина пароля! Пароль должен быть от 3 до 20 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }

    if ($action == "login") {
        $rememberMe = filter_var(trim($_POST['RememberMe']), FILTER_SANITIZE_STRING);
    } else if ($action == "register") {
        $confirmPassword = filter_var(trim($_POST['ConfirmPassword']), FILTER_SANITIZE_STRING);
        if($password != $confirmPassword) {
            echo '<b>Пароли не совпадают!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }

        $userName = filter_var(trim($_POST['UserName']), FILTER_SANITIZE_STRING);
        if(mb_strlen($userName) < 3 || mb_strlen($userName) > 150) {
            echo '<b>Недопустимая длина имени пользователя! Имя пользователя от 3 до 150 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }
    
        $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
        if(mb_strlen($email) < 10 || mb_strlen($email) > 150) {
            echo '<b>Недопустимая длина e-mail! E-mail должен быть от 10 до 150 символов!</b><br><hr class="bhr"><br><a href="/'.$action.'" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
            exit();
        }
    }
    
    $password = md5($password."abzlagoc"); // Создаем хэш из пароля

    require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";

    if ($action == "login") {
        $isRememberMe = $rememberMe == "on" ? 1 : 0;
        Login($login, $password, $isRememberMe);
    } 
    else if ($action == "register") {
        Register($login, $password, $userName, $email);
    } else if ($action == "remove") {
        Remove($login, $password);
    } else {
        header('Location: /');
    }