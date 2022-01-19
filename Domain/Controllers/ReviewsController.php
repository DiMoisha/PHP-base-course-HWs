<?php
    function Index() {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ReviewsRepository.php";
        require_once LOCAL_PATH_ROOT."/Domain/Views/Reviews/Index.php";
        return IndexView(GetList());
    }

    function GetCreate() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Reviews/Create.php";
        return CreateView();
    }

    function Create($review) {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ReviewsRepository.php";
        

        if(CreateReview($review) < 1) {
            echo '<b>Не удалось создать отзыв! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/addreview" title="Вернуться на страницу отзыва">« Вернуться на предыдущую страницу</a>';
            exit();
        } else {
            header('Location: /reviews');
        }
    }