<?php
    function IndexView($products) {
        if(count($products) < 1) {
            $view = '<p class="bg-warning">В настоящий момент информация о продукции отсутствует!</p>';
            
            if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                            && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
                $view .= '<hr class="null-margin"><br><a href="/addproduct" class = "btn btn-xs-sm-md btn-success" role = "button" title = "Добавить товар">Добавить товар</a>';
            } 
        } else {
            $list = "";
            foreach ($products as $item) {
                $list .= '<tr><td><a href="/product?id='.$item -> productId.'" class="product-name" title="Подробнее">'.$item -> productName.'</a></td><td>'
                        .$item -> unit.'</td><td>'.($item -> price == 0 ? 'по запросу' : $item -> price.' руб.').'</td><td>
                        <form action="/server/cart.php" method="post" role="form"><input type="hidden" id="Action" name="Action" value="add">
                        <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/products">
                        <input type="hidden" id="ProductId" name="ProductId" value="'.$item -> productId.'">
                        <button type="submit" class="btn btn-xs-sm-md" role="button" value="Купить" title="Купить">Купить</button></form></td></tr>';

                if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
                    $list .= '<tr><td colspan="4">
                            <a href="/editproduct?id='.$item -> productId.'" class="btn btn-xs-sm-md btn-warning" role = "button" title="Редактировать товар">
                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Редактировать
                            </a>
                            <a href="/removeproduct?id='.$item -> productId.'" class="btn btn-xs-sm-md btn-danger" role = "button" title="Удалить товар">
                                <span class="glyphicon glyphicon-remove"></span>&nbsp;Удалить
                            </a>
                        </td></tr>';
                }
            }

            $view = '';
            if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
                $view = '<a href="/addproduct" class = "btn btn-xs-sm-md btn-success" role = "button" title = "Добавить товар">Добавить товар</a>';
            } 

            $view .= '<h2>Цены на продукцию ООО "ЛАГОС"</h2><div class="table-responsive">
                    <table class="table table-bordered table-hover productlist-product"><thead><tr>
                    <th>Наименование продукции</th><th>Ед.изм.</th><th>Цена по предоплате с НДС</th><th align="center" class="text-center">
                    <span class="glyphicon glyphicon-shopping-cart"></span></th></tr></thead><tbody>'.$list.'</tbody></table></div>';

            if($_COOKIE['loginlogin'] && $_COOKIE['loginuserid'] && $_COOKIE['loginuser'] && $_COOKIE['loginemail'] 
                        && $_COOKIE['loginroleid'] && $_COOKIE['loginrole'] && $_COOKIE['loginroleid'] == '1') {
                $view .= '<a href="/addproduct" class = "btn btn-xs-sm-md btn-success" role = "button" title = "Добавить товар">Добавить товар</a>';
            } 
        }

        return $view;
    }