<?php
    require_once "../config.php";

    $userName = filter_var(trim($_POST['UserName']), FILTER_SANITIZE_STRING);
    if(mb_strlen($userName) < 3 || mb_strlen($userName) > 150) {
        echo '<b>Недопустимая длина имени пользователя! Имя пользователя от 3 до 150 символов!</b><br><hr class="bhr"><br><a href="/addreview" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }
    
    $email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_EMAIL);
    if(mb_strlen($email) < 10 || mb_strlen($email) > 150) {
        echo '<b>Недопустимая длина e-mail! E-mail должен быть от 10 до 150 символов!</b><br><hr class="bhr"><br><a href="/addreview" title="Вернуться на предыдущую страницу">« Вернуться на предыдущую страницу</a>';
        exit();
    }

    $reviewText = filter_var(trim($_POST['ReviewText']), FILTER_SANITIZE_STRING);

    require_once LOCAL_PATH_ROOT."/Domain/Controllers/ReviewsController.php";
    require_once LOCAL_PATH_ROOT."/Domain/Models/ReviewModel.php";
    Create((new ReviewViewModel) -> Set(null, null, $userName, $email, $reviewText));