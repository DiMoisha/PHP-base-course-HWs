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
        $view .= '</div><br><br>';
        
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            $view .= '<div><h3 class="bg-f3">Работа с содержимым сайта:</h3><hr>';
            $view .= '<a href="/news" title="Новости" class="btn btn-default"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Новости</a>&nbsp;&nbsp;&nbsp;';
            $view .= '<a href="/reviews" title="Отзывы" class="btn btn-default"><span class="glyphicon glyphicon-comment"></span>&nbsp;Отзывы</a>&nbsp;&nbsp;&nbsp;';
            $view .= '<a href="/feedback" title="Обратная связь" class="btn btn-default"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Обратная связь</a>&nbsp;&nbsp;&nbsp;';
            $view .= '<a href="/products" title="Продукция" class="btn btn-default"><span class="glyphicon glyphicon-th"></span>&nbsp;Продукция</a>&nbsp;&nbsp;&nbsp;';
            $view .= '<a href="/articles" title="Статьи" class="btn btn-default"><span class="glyphicon glyphicon-text-color"></span>&nbsp;Статьи</a></div><br><br>';        
        }

        $view .= '<div><h3 class="bg-f3">Заказы и платежи:</h3><hr>';
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '2') {
            $view .= '<a href="/cart" title="Корзина" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Корзина</a>&nbsp;&nbsp;&nbsp;';        
        }
        $view .= '<a href="/orders" title="Заказы" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Заказы</a>&nbsp;&nbsp;&nbsp;';
        $view .= '<a href="/pays" title="Платежи" class="btn btn-default"><span class="glyphicon glyphicon-ruble"></span>&nbsp;Платежи</a></div>';

        return $view;
    }