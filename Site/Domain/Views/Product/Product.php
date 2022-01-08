<?php
    function ProductView($product) {
        $view = '<div class="pull-left text-center product-img-container"><img class="img-responsive product-img" src="/images/products/';
        $view .= count($product -> productPics) > 0 ? $product -> productPics[0] -> picName : "default.jpg";
        $view .= '" height="300" width="400"  alt="'.(count($product -> productPics) > 0 ? $product -> product -> productName : "").'"  /></div>';
        $view .= '<div class="text-right product-price-container"><p class="product-price">Цена по предоплате без НДС:&nbsp; <b>';
        $view .= $product -> product -> price.'&nbsp;руб.</b></p><p class="product-price">Цена по предоплате с НДС:&nbsp; <b>';
        $view .= $product -> product -> price.'&nbsp;руб.</b></p><p class="product-unit">Единица измерения:&nbsp; <b>'.$product -> product -> unit.'</b></p></div>';
        $view .= '<div class="text-right product-cart-container">
                    <form action="/server/cart.php" method="post" role="form" enctype = "multipart/form-data">
                        <input type="hidden" id="Action" name="Action" value="add">
                        <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/product?id='.$product -> product -> productId.'">
                        <input type="hidden" id="ProductId" name="ProductId" value="'.$product -> product -> productId.'">
                        <button type="submit" class="btn btn-success btn-lg" role="button" value="Купить" title="Купить">
                            <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;В КОРЗИНУ
                        </button>
                    </form>
                </div>';
        if (count($product -> productPics) > 0) {
            $view .= '<div class="product-pics-container">';
            foreach ($product -> productPics as $pic) {
                $view .= '<a href="/images/products/'.$pic -> picName.'"><img data-src="holder.js/120x90" class="img-thumbnail product-img-thumbnail" 
                          src="/images/products/thumbnails/'.$pic -> picName.'" alt="'.$pic -> picName.'" /></a>';
            }
            $view .= '</div>';
        }
        if ($product -> product -> descr && !empty($product -> product -> descr)) {
            $view .= '<div class="panel panel-default clearboth product-descr"><div class="panel-heading"><h2 class="panel-title">Описание продукции</h2>
                      </div><div class="panel-body">'.$product -> product -> descr.'</div></div>';
        }
        $view .= '<div class="text-left clearboth"><hr class="bhr"><a href="" onclick="JavaScript:window.history.back(1); return false;" role="button" title="Возврат на предыдущую страницу">&laquo; Вернуться на предыдущую страницу</a></div>';
        
        return $view; 
    }