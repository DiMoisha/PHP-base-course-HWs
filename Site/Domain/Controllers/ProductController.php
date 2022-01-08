<?php
    function Index() {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";
        require_once LOCAL_PATH_ROOT."/Domain/Views/Product/Index.php";
        return IndexView(GetList());
    }

    function GetCreate() {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                            && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            require_once LOCAL_PATH_ROOT."/Domain/Views/Product/Create.php";
            return CreateView();
        } else {
            header('Location: /404');
        }
    }
    
    function Create($product) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";

            if(CreateProduct($product) < 1) {
                echo '<b>Не удалось добавить товар! Попробуйте еще раз!</b><br><hr class="bhr"><br><a href="/addproduct" title="Вернуться на страницу добавления товара">« Вернуться на предыдущую страницу</a>';
                exit();
            } else {
                header('Location: /products');
            }
        } else {
            header('Location: /404');
        }
    }

    function GetEdit($productId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";
            require_once LOCAL_PATH_ROOT."/Domain/Views/Product/Edit.php";
            $view = '<b>Не удалось открыть страницу товара! Попробуйте еще раз!</b>';
            $pageHeading    = "Редактирование товара";
            $meta_descr     = '';
            $meta_keywords  = '';
            $menu_item      = "editproduct";

            $product = GetProduct($productId);

            if($product -> product) {
                $view           = EditView($product);
                $pageTitle      = $product -> product -> html_pg_title;
                $meta_descr     = $product -> product -> html_mt_descr;
                $meta_keywords  = $product -> product -> html_mt_kwrds;
            }

            return [$view, $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
        } else {
            header('Location: /404');
        }
    }
    
    function Edit($product) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";

            if(EditProduct($product) < 1) {
                echo '<b>Не удалось отредактировать товар! Попробуйте еще раз!</b>';
                exit();
            } else {
                header('Location: /products');
            }
        } else {
            header('Location: /404');
        } 
    }

    function Details($productId) {
        require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";
        require_once LOCAL_PATH_ROOT."/Domain/Views/Product/Product.php";
        $view = '<b>Не удалось открыть страницу товара! Попробуйте еще раз!</b>';
        $pageHeading    = "Товар";
        $meta_descr     = '';
        $meta_keywords  = '';
        $menu_item      = "product";

        $product = GetProduct($productId);

        if($product -> product) {
            $view           = ProductView($product);
            $pageHeading    = $product -> product -> productName; 
            $pageTitle      = $product -> product -> html_pg_title;
            $meta_descr     = $product -> product -> html_mt_descr;
            $meta_keywords  = $product -> product -> html_mt_kwrds;
        }

        return [$view, $pageTitle, $pageHeading, $meta_descr, $meta_keywords, $menu_item];
    }
    
    function Remove($productId) {
        if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
            require_once LOCAL_PATH_ROOT."/Domain/Repositories/ProductRepository.php";

            if(RemoveProduct($productId) < 1) {
                echo '<b>Не удалось удалить товар! Попробуйте еще раз!</b>';
                exit();
            } else {
                header('Location: /products');
            }
        } else {
            header('Location: /404');
        } 
    }