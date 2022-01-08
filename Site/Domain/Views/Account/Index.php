<?php
    function IndexView() {
        $view = '<h2>Здравствуйте, '.$_COOKIE['loginuser'].'</h2><h3>Ваши регистрационные данные:</h3><hr>
                <p><h4 class="bg-f3">Логин:</h4>'.$_COOKIE['loginlogin'].'</p>
                <p><h4 class="bg-f3">Имя:</h4>'.$_COOKIE['loginuser'].'</p>
                <p><h4 class="bg-f3">email:</h4>'.$_COOKIE['loginemail'].'</p>
                <br>
                <hr>
                <br>
                <p><h4 class="bg-f3">Статус:</h4>'.$_COOKIE['loginrole'].'</p>
                <hr class="bhr">
                <div>
                    <a href="/logoff" title="Выйти из личного кабинета" class="btn btn-default">
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;Выйти
                    </a>';

        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                    && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '2') {
            $view .= '<a href="/removelogin" title="Удалить учетную запись" class="btn btn-default pull-right">
                        <span class="glyphicon glyphicon-remove"></span>&nbsp;Удалить учетную запись
                     </a>';
        }
                   
        $view .= '</div>';

        return $view;
    }