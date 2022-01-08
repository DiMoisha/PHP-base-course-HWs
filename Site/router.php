<?php
    $routes = [
        "/"                 => '_index',
        "/Home/"            => '_index',
        "/Home"             => '_index',
        // срабатывает при вызове /about или /index.php/about
        "/about/"           => '_about',
        "/about"            => '_about',
        "/contact/"         => '_contact',
        "/contact"          => '_contact',
        "/delivery/"        => '_delivery',
        "/delivery"         => '_delivery',
        "/coldasphalt/"     => '_coldasphalt',
        "/coldasphalt"      => '_coldasphalt',
        "/asphalt/"         => '_asphalt',
        "/asphalt"          => '_asphalt',
        "/emulsion/"        => '_emulsion',
        "/emulsion"         => '_emulsion',
        "/laboratory/"      => '_laboratory',
        "/laboratory"       => '_laboratory',
        "/services/"        => '_services',
        "/services"         => '_services',
        "/calculator/"      => '_calculator',
        "/calculator"       => '_calculator',
        "/pricelist/"       => '_pricelist',
        "/pricelist"        => '_pricelist',
        "/news/"            => '_news',
        "/news"             => '_news',
        "/login/"           => '_login',
        "/login"            => '_login',
        "/logoff/"          => '_logoff',
        "/logoff"           => '_logoff',
        "/register/"        => '_register',
        "/register"         => '_register',
        "/removelogin/"     => '_removelogin',
        "/removelogin"      => '_removelogin',
        "/lk/"              => '_lk',
        "/lk"               => '_lk',
        "/reviews/"         => '_reviews',
        "/reviews"          => '_reviews',
        "/addreview/"       => '_addreview',
        "/addreview"        => '_addreview',
        "/products/"        => '_products',
        "/products"         => '_products',
        "/product/"         => '_product',
        "/product"          => '_product',
        "/addproduct"       => '_addproduct',
        "/addproduct"       => '_addproduct',
        "/editproduct/"     => '_editproduct',
        "/editproduct"      => '_editproduct',
        "/removeproduct/"   => '_removeproduct',
        "/removeproduct"    => '_removeproduct',
        "/cart/"            => '_cart',
        "/cart"             => '_cart',
        "/404/"             => 'notFound',
        "/404"              => 'notFound'
    ];

    function getRequestPath() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        return '/' . ltrim(str_replace('index.php', '', $path), '/');
    }

    function getMethod(array $routes, $path) {
        foreach ($routes as $route => $method) {
            if ($path === $route) {
                return $method;
            }
        }

        return 'notFound';
    }

    function _index() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "ООО ЛАГОС | Главная";
        $pageHeading    = "ООО ЛАГОС";
        $meta_descr     = "ООО ЛАГОС. Производство, продажа материалов для дорожного строительства. Асфальт. Битумная эмульсия. Новости ООО ЛАГОС";
        $meta_keywords  = "дорожное строительство, материалы для строительства дорог, производство, асфальт, бетон, битум, мастика, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "index";
        return [Index(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _about() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "О компании | Производство, продажа материалов, контакты";
        $pageHeading    = "О компании";
        $meta_descr     = "Деятельность завода. Асфальт. Битумная эмульсия. Производство материалов для дорожного строительства";
        $meta_keywords  = "о предприятии, производство, продажа материалов, производство асфальта, дорожные работы, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "about";
        return [About(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _contact() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "Контакты | Адрес, отделы, схема проезда";
        $pageHeading    = "Контакты";
        $meta_descr     = "Контакты завода ОО ЛАГОС. Точный адрес, телефоны отделов, подробная схема проезда до завода, электронная почта и телефоны для контакта с сотрудниками";
        $meta_keywords  = "контакты, ЛАГОС контакты, адрес завода, адрес ООО ЛАГОС, асфальт, бетон, асфальтобетонный завод, ЛАГОС";
        $menu_item      = "contact";
        return [Contact(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _calculator() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "Калькулятор асфальта | Расчет расхода асфальта";
        $pageHeading    = "Калькулятор асфальта";
        $meta_descr     = "Калькулятор асфальта, расчет расхода асфальта для строительства дорог. Точный расчет расхода асфальта";
        $meta_keywords  = "расчет асфальта, калькулятор асфальта, толщина слоя, асфальтобетонный завод, асфальт, ООО ЛАГОС";
        $menu_item      = "calculator";
        return [Calculator(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _pricelist() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "Прайс-лист | Скачать";
        $pageHeading    = "Прайс-лист";
        $meta_descr     = "Прайс-лист";
        $meta_keywords  = "Прайс-лист, дорожные материалы, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "pricelist";
        return [PriceList(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _news() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/HomeController.php";
        $pageTitle      = "Новости | Важная информация для наших покупателей";
        $pageHeading    = "Новости";
        $meta_descr     = "Новости ЛАГОС. Важная, оперативная информация для наших покупателей.";
        $meta_keywords  = "новости ЛАГОС, новости, информация для клиентов, асфальт, бетон, битум, асфальтобетонный завод, ЛАГОС";
        $menu_item      = "news";
        return [News(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _delivery() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Доставка | Асфальта и битумных эмульсий";
        $pageHeading    = "Доставка";
        $meta_descr     = "Доставка асфальта и битумных эмульсий по Москве и области. Удобство и скорость доставки";
        $meta_keywords  = "доставка, асфальт, доставка асфальта, доставка битумных эмульсий, самосвалы, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "delivery";
        return [Delivery(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }
 
    function _coldasphalt() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Холодный асфальт | Купить, применение";
        $pageHeading    = "Холодный асфальт";
        $meta_descr     = "Холодный асфальт. Описание, производство, применение, технология укладки, купить. Пример укладки холодного асфальта";
        $meta_keywords  = "холодный асфальт, применение холодного асфальта, купить, укладка холодного асфальта, асфальт, дорожные материалы, асфальтобетонный завод, ОOО ЛАГОС";
        $menu_item      = "coldasphalt";
        return [ColdAsphalt(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _asphalt() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Асфальт | Марки, производство, цены";
        $pageHeading    = "Асфальт";
        $meta_descr     = "Асфальт. Природный асфальт, искусственный асфальт, марки и виды асфальта. Производство и продажа асфальта";
        $meta_keywords  = "асфальт, марки асфальта, производство асфальта, продажа асфальта, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "asphalt";
        return [Asphalt(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _laboratory() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Услуги испытательной лаборатории";
        $pageHeading    = "Услуги испытательной лаборатории";
        $meta_descr     = "Услуги испытательной лаборатории. Важность испытаний. Услуги по испытаниям материалов для строительства дорожного покрытия. Сертификат испытательной лаборатории.";
        $meta_keywords  = "Услуги испытательной лаборатории, асфальт, щебень, песок, отсев, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "laboratory";
        return [Laboratory(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _services() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Дорожное строительство | Автомобильные дороги";
        $pageHeading    = "Дорожное строительство";
        $meta_descr     = "Дорожное строительство. Классы и категории автомобильных дорог";
        $meta_keywords  = "Дорожное строительство, строительство дорог, ремонт дорог, асфальт, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "services";
        return [Services(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _emulsion() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ArticlesController.php";
        $pageTitle      = "Битумные эмульсии | Производство, применение, катионная и анионная";
        $pageHeading    = "Битумные эмульсии";
        $meta_descr     = "Битумные эмульсии. Производство и применение. Катионная и анионная битумные эмульсии.";
        $meta_keywords  = "битумные эмульсии, эмульсия, битум, катионная битумная эмульсия, анионная битумная эмульсия, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "emulsion";
        return [Emulsion(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _login() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";
        $pageTitle      = "Вход на сайт";
        $pageHeading    = "Выполнить вход";
        $meta_descr     = "Вход на сайт";
        $meta_keywords  = "Вход";
        $menu_item      = "login";
        return [GetLogin(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _logoff() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";
        $pageTitle      = "Выйти из личного кабинета";
        $pageHeading    = "Выйти";
        $meta_descr     = "Выйти из личного кабинета";
        $meta_keywords  = "Выйти";
        $menu_item      = "logoff";
        return [LogOff(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _register() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";
        $pageTitle      = "Регистрация на сайте";
        $pageHeading    = "Регистрация";
        $meta_descr     = "Регистрация на сайте";
        $meta_keywords  = "Регистрация";
        $menu_item      = "register";
        return [GetRegister(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _removelogin() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";
        $pageTitle      = "Удалить учетную запись";
        $pageHeading    = "Удалить учетную запись";
        $meta_descr     = "Удалить учетную запись";
        $meta_keywords  = "Удалить учетную запись";
        $menu_item      = "removelogin";
        return [GetRemove(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }
    
    function _lk() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/AccountController.php";
        $pageTitle      = "Личный кабинет пользователя";
        $pageHeading    = "Личный кабинет";
        $meta_descr     = "Личный кабинет пользователя";
        $meta_keywords  = "Личный кабинет";
        $menu_item      = "lk";
        return [Index(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _reviews() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ReviewsController.php";
        $pageTitle      = "Отзывы";
        $pageHeading    = "Отзывы";
        $meta_descr     = "Отзывы";
        $meta_keywords  = "Отзывы";
        $menu_item      = "reviews";
        return [Index(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _addreview() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ReviewsController.php";
        $pageTitle      = "Оставить отзыв";
        $pageHeading    = "Отзыв";
        $meta_descr     = "Оставить отзыв";
        $meta_keywords  = "Отзыв";
        $menu_item      = "addreview";
        return [GetCreate(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _products() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";
        $pageTitle      = "Продукция и услуги | Купить, цена";
        $pageHeading    = "Продукция";
        $meta_descr     = "Купить продукцию по выгодной цене. Предварительный заказ, даставка. Продукция и услуги, асфальтобетонный завод ООО ЛАГОС";
        $meta_keywords  = "Продукцию и услуги купить, цена, производство, дорожные материалы, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "products";
        return [Index(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _product() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";
        if (isset($_GET['id'])) {
            return Details(intval(filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING)));
        }

        return notFound();
    }

    function _addproduct() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";
        $pageTitle      = "Добавление товара";
        $pageHeading    = "Добавление товара";
        $meta_descr     = "Добавление товара";
        $meta_keywords  = "Добавление товара, ООО ЛАГОС";
        $menu_item      = "addproduct";
        return [GetCreate(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function _editproduct() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";
        if (isset($_GET['id'])) {
            return GetEdit(intval(filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING)));
        }

        return notFound();
    }

    function _removeproduct() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/ProductController.php";
        if (isset($_GET['id'])) {
            return Remove(intval(filter_var(trim($_GET['id']), FILTER_SANITIZE_STRING)));
        }

        return notFound();
    }

    function _cart() {
        require_once LOCAL_PATH_ROOT."/Domain/Controllers/CartController.php";
        $pageTitle      = "Ваша корзина";
        $pageHeading    = "Ваша корзина";
        $meta_descr     = "Корзина покупок. ООО ЛАГОС";
        $meta_keywords  = "корзина покупок, асфальтобетонный завод, ООО ЛАГОС";
        $menu_item      = "cart";
        return [Index(), $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }

    function notFound() {
        header("HTTP/1.0 404 Not Found");
        return ['<h2 style="color:red;">Нет такой страницы!!!<h2>', 'Нет такой страницы', 'Нет такой страницы', 'Нет такой страницы', 'Нет такой страницы', 'none'];
    }

    $path = getRequestPath();
    $method = getMethod($routes, $path);
    [$content, $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item] = $method();