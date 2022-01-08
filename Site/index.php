<?php
    require_once "config.php";
    $pageTitle   = "ООО ЛАГОС";
    $pageHeading = "ООО ЛАГОС";
    $meta_descr = "";
    $meta_keywords = "";
    $menu_item = "";
    require_once LOCAL_PATH_ROOT."/router.php";
?>
<!--
    Урок 6. Интерактивность
    1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.
    2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.
    3. Добавить функционал отзывов в имеющийся у вас проект.
    4. Создать страницу каталога товаров:
    товары хранятся в БД (структура прилагается);
    страница формируется автоматически;
    по клику на товар открывается карточка товара с подробным описанием.
    подумать, как лучше всего хранить изображения товаров.
    5. *Написать CRUD-блок для управления выбранным модулем через единую функцию (doFeedbackAction()).


    Урок 7. Авторизация и аутентификация
    1. Создать модуль корзины. В нее можно добавлять товары, а можно удалять.
    | Запрос | Данные запроса | Данные ОК ответа | Данные ответа с ошибкой | Данные ОК ответа JSON | Данные ответа JSON с ошибкой | Комментарий |
    |--------------------------|--------------------------------------|------------------|-------------------------|-----------------------|-----------------------------------------------------|---------------------------------------------------------------------------------------|
    | Добавить товар в корзину | {"id_product" : 123, "quantity" : 1} | (string) 1 | (string) 0 | { result: 1 } | { result: 0, errorMessage : "Сообщение об ошибке" } | Подразумевается, что целевая корзина пользователя идентифицируется на стороне сервера |
    | Удалить товар из корзины | {"id_product" : 123} | (string) 1 | (string) 0 | { result: 1 } | { result: 0, errorMessage : "Сообщение об ошибке" } | |

    Использовать сущность good в качестве товара.
    2. Создать модуль личного кабинета, на который будет перенаправляться пользователь после логина. Вывести там имя, логин и приветствие.
    3. *Создать модуль регистрации пользователя (см. ссылку в доп. материалах).
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Дмитрий Карасёв">
    <meta name="description" content="<?= $meta_descr?>" />
    <meta name="keywords" content="<?= $meta_keywords?>" />
    <title><?= $pageTitle?></title>
    <script src="/js/fontloader.js"></script>
    <link href="/images/favicon.ico" rel="shortcut icon">
    <link href="/css/styles.css" rel="stylesheet"/>
    <script src="/js/jquery.js"></script>
    <script src="/js/jqueryui.js"></script>
    <script src="/js/jqueryval.js"></script>
    <script src="/js/modernizr.js"></script>
</head>
<body>
    <header class="hidden-print">
        <div class="hidden-xs top-menu-wrapper">
            <div class="container clearfix ">
                <ul class="nav navbar-nav top-menu">
                    <li role="menuitem">
                        <a href="/delivery/">Доставка</a>
                    </li>
                    <li role="menuitem">
                        <a href="/pricelist/">Прайс-лист</a>
                    </li>
                </ul>
                <div class="pull-right top-right">
                    <?php if($_COOKIE['loginuser'] && $_COOKIE['loginuserid'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) :?>
                        <a href="/lk">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;<?= $_COOKIE['loginuser'] ?>
                        </a>
                        <a href="/logoff" title="Выйти из личного кабинета">
                            <span class="glyphicon glyphicon-log-out"></span>&nbsp;Выйти
                        </a>
                    <?php else : ?>
                        <a href="/login" title="Войти в личный кабинет">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;Войти
                        </a>
                    <?php endif; ?>
                    <a href="/cart">
                        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Корзина
                    </a>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default navbar-static-top navbar-wrapper" role="navigation">
            <div class="container clearfix">
                <div class="navbar-header header-logo">
                    <button type="button" class="navbar-toggle btn-main-menu-xs" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-brand-xs visible-xs" href="/Home">
                        <img src="/images/logo-xs.png" width="210" height="55" >
                    </a>
                    <div class="row hidden-xs">
                        <a class="navbar-brand logo-brand col-sm-4 col-md-3 hidden-xs" href="/Home">
                            <img class="hidden-sm" src="/images/logo.png" width="260" height="74">
                            <img class="visible-sm" src="/images/logo-xs.png" width="210" height="55">
                        </a>
                        <adress class="col-sm-8 col-md-9 vcard vcard-top">
                            <div class="row">
                                <div class="value-title fn org invisible" style="height:0;">ООО "ЛАГОС"</div>
                                <div class="col-sm-6 col-md-7 text-center adr" >
                                    <span class="locality">Московская область, Люберецкий район, п. Красково</span>,&nbsp;
                                    <br class="hidden-sm" />
                                    <span class="street-address">ул. 2-ая Заводская, д. 2А</span>
                                </div>
                                <div class="col-sm-6 col-md-5 text-center">
                                    <div class="whs">
                                        <span class="hidden-md hidden-lg">Работаем</span><span class="hidden-sm">Мы работаем</span>&nbsp;<span class="workhours">круглосуточно</span>
                                    </div>
                                    <div class="tel">
                                        <abbr class="value">+7 (910) 411-35-04</abbr>
                                    </div>
                                </div>
                            </div>
                        </adress>
                    </div>
                </div>
            </div>
            <div class="container-fluid main-menu-wrapper">
                <div class="container">
                    <nav class="navbar-collapse collapse">
                        <ul class="nav navbar-nav main-menu">
                            <li role="menuitem">
                                <a href="/">
                                    <span class="glyphicon glyphicon-home hidden-xs"></span>
                                    <span class="visible-xs">Главная</span>
                                </a>
                            </li>
                            <li role="menuitem" class="<?= $menu_item == "about" ? "active" : ""?>">
                                <a href="/about/" > О компании</a>
                            </li>
                            <li role="menuitem" class="<?= $menu_item == "products" ? "active" : ""?>">
                                <a href="/products/" >Продукция</a>
                            </li>
                            <li role="menuitem" class="<?= $menu_item == "coldasphalt" ? "active" : ""?>">
                                <a href="/coldasphalt/" >Холодный асфальт</a>
                            </li>
                            <li role="menuitem" class="<?= $menu_item == "contact" ? "active" : ""?>">
                                <a href="/contact/">Контакты</a>
                            </li>
                            <li class="visible-xs <?= $menu_item == "reviews" ? "active" : ""?>" role="menuitem">
                                <a href="/reviews/">Отзывы</a>
                            </li>
                            <li class="visible-xs <?= $menu_item == "login" ? "active" : ""?>" role="menuitem">
                                <?php if($_COOKIE['loginuser'] && $_COOKIE['loginuserid'] && $_COOKIE['loginroleid'] && $_COOKIE['loginrole']) :?>
                                    <a href="/lk">
                                        <span class="glyphicon glyphicon-user"></span>&nbsp;<?= $_COOKIE['loginuser'] ?>
                                    </a>
                                    <a href="/logoff" title="Выйти из личного кабинета">
                                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;Выйти
                                    </a>
                                <?php else : ?>
                                    <a href="/login" title="Войти в личный кабинет">
                                        <span class="glyphicon glyphicon-log-in"></span>&nbsp;Войти в личный кабинет
                                    </a>
                                <?php endif; ?>
                            </li>
                            <li class="visible-xs <?= $menu_item == "cart" ? "active" : ""?>" role="menuitem">
                                <a href="/cart">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Корзина
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php 
        if ($menu_item == "index") {
            echo '<div class="container body-content content-wrapper">'.$content.'</div>';
        } else {
            echo '<h1>'.$pageHeading.'</h1><div class="container body-content content-wrapper"><div class="row"><div class="content-block col-md-12 '.($menu_item == "news" ? 'null-padding' : '').'">'.$content.'</div></div></div>';
        }
    ?>
    <footer class="footer-wrapper hidden-print">
        <div class="container">
            <div class="row">
                <adress class="hidden-xs col-sm-4 text-left vcard footer-menu-wrapper footer-info">
                    <span class="category hidden">Завод</span>&nbsp;
                    <p class="fn org">ООО "ЛАГОС"</p>
                    <p class="adr">
                        <span class="locality">Московская область, Люберецкий район, п. Красково</span>,
                        <span class="street-address">ул. 2-ая Заводская, д.2А</span>
                    </p>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <p>
                        <!-- Yandex.Metrika informer -->
                        <a href="https://metrika.yandex.ru/stat/?id=43775804&amp;from=informer"
                        target="_blank" rel="nofollow">
                            <img src="https://informer.yandex.ru/informer/43775804/3_0_FEFEFEFF_DEDEDEFF_0_uniques"
                                style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="43775804" data-lang="ru" />
                        </a>
                        <!-- /Yandex.Metrika informer -->
                    </p>
                </adress>
                <adress class="col-xs-6 col-sm-4 text-left vcard footer-menu-wrapper footer-info">
                    <p class="visible-xs fn org">ООО "ЛАГОС"</p>
                    <p class="visible-xs adr">
                        <span class="locality">Московская область, Люберецкий район, п. Красково</span>,
                        <span class="street-address">ул. 2-ая Заводская, д.2А</span>
                        <br /><br />
                    </p>
                    <p class="buh-info">
                        <span class="footer-info-header">По общим вопросам</span>
                        <p>
                            <span class="glyphicon glyphicon-envelope email-marker"></span>&nbsp;
                            <a class="email">lagos99@mail.ru ; lagos-ABZ@mail.ru</a>
                        </p>
                    </p>
                    <p class="disp-info">
                        <span class="footer-info-header">Диспетчерская</span>
                        <p class="tel">
                            <span class="glyphicon glyphicon-earphone phone-marker"></span>&nbsp;
                            <abbr class="value">8-910-411-35-04</abbr>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-dashboard dashboard-marker"></span>&nbsp;
                            <span class="dashboard">С 8:00 до 17:00 с пн-вс</span>
                        </p>
                    </p>
                    <p  class="ca-info">
                        <span class="footer-info-header">По вопросам о холодных смесях обращайтесь по телефону</span>
                        <p class="tel">
                            <span class="glyphicon glyphicon-earphone phone-marker"></span>&nbsp;
                            <abbr class="value">+7-903-212-64-36</abbr>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-dashboard dashboard-marker"></span>&nbsp;
                            <span class="dashboard">С 8:00 до 17:00 с пн-вс</span>
                        </p>
                    </p>
                    <p  class="ca-info">
                        <span class="footer-info-header">Услуги испытательной лаборатории</span>
                        <p class="tel">
                            <span class="glyphicon glyphicon-earphone phone-marker"></span>&nbsp;
                            <abbr class="value">+7-903-212-64-36</abbr>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-dashboard dashboard-marker"></span>&nbsp;
                            <span class="dashboard">С 8:00 до 17:00 с пн-вс</span>
                        </p>
                    </p>

                </adress>
                <div class="col-xs-6 col-sm-4 footer-menu-wrapper">
                    <ul class="nav nav-pills nav-stacked footer-menu">
                        <li class="navbar-header footer-info-header">ИНФОРМАЦИЯ</li>
                        <li>
                            <a href="/contact/">Контакты</a>
                        </li>
                        <li>
                            <a href="/news/">Новости</a>
                        </li>
                        <li>
                            <a href="/about/">О компании</a>
                        </li>
                        <li>
                            <a href="/reviews/" class="reviews-item">ОТЗЫВЫ</a>
                        </li>
                    </ul>
                    <p>&nbsp;</p>
                    <ul class="nav nav-pills nav-stacked footer-menu">
                        <li class="navbar-header footer-info-header">ПОКУПАТЕЛЯМ</li>
                        <li>
                            <a href="/pricelist/" >Прайс-лист</a>
                        </li>
                        <li>
                            <a href="/calculator/" >Калькулятор асфальта</a>
                        </li>
                        <li>
                            <a href="/coldasphalt/">Холодный асфальт</a>
                        </li>
                        <li>
                            <a href="/asphalt/">Асфальт</a>
                        </li>
                        <li >
                            <a href="/emulsion/">Битумные эмульсии</a>
                        </li>
                        <li>
                            <a href="/services/">Дорожное строительство</a>
                        </li>
                        <li >
                            <a href="/laboratory/">Услуги испытательной лаборатории</a>
                        </li>
                        <li>
                            <a href="/delivery/">Доставка</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-bottom-wrapper">
            <div class="container clearfix footer-bottom">
                <p class="footer-copyright-info">
                    &copy;&nbsp;<?= date('Y')?> &nbsp;&nbsp;<span class="fn">ООО "ЛАГОС"</span>
                </p>
                <p class="pull-right back-to-top-wrap">
                    <a class="back-to-top" href="#top">
                        <span class="glyphicon glyphicon-chevron-up"></span>
                    </a>
                </p>
            </div>
        </div>
    </footer>
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jqueryui.js"></script>
</body>
</html>