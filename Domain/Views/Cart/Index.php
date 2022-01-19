<?php
    function IndexView($cart) {
        $view = '<p class="text-center bg-eee"><b>Ваша корзина пуста!</b></p>';

        if (count($cart -> items) > 0) {
            $view = '<h2>В корзине: </h2>
                    <table align="center" class="table table-hover">
                        <thead>
                            <tr>
                                <th align="left" class="text-left">Товар</th>
                                <th align="left" class="text-left">Ед.изм.</th>
                                <th align="right" class="text-right">Цена</th>
                                <th align="left" class="text-left">Количество</th>
                                <th align="left" class="text-left">X</th>
                                <th align="right" class="text-right">Всего</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach($cart -> items as $item) {
                $view .= '<tr>
                            <td align="left"><a href="/product?id='.$item -> productId.'" class="product-name" title="Подробнее">'.$item -> productName.'</a></td>
                            <td align="left">'.$item -> unit.'</td>
                            <td align="right">'.$item -> price.'&nbsp;руб.</td>
                            <td align="left">
                                <form action="/server/cart.php" method="post" role="form">
                                    <input type="hidden" name="Action" value="recalc">
                                    <input type="hidden" name="ProductId" value="'.$item -> productId.'">
                                    <input type="number" placeholder="1.0" step="0.01" min="0" max="99999999999.99" name="Quantity" value="'.$item -> quantity.'" placeholder="Укажите количество товара" pattern="\d+(.\d{0,3})?" required="required" size="12" />
                                    <input class="actionButtons btn btn-xs-sm btn-refresh " type="submit" value="&#8634;" title="Пересчитать товары в корзине" />
                                    <p><font size="2" color="#aaa">дробную часть вводить через точку</font></p>
                                </form>
                            </td>
                            <td align="left">
                                <form action="/server/cart.php" method="post" role="form">
                                    <input type="hidden" name="Action" value="remove">
                                    <input type="hidden" name="ProductId" value="'.$item -> productId.'">
                                    <input class="actionButtons btn btn-xs-sm btn-danger" type="submit" value="&#10008;" title="Удалить товар из корзины" />
                                </form>
                            </td>
                            <td align="right">'.$item -> sm.'&nbsp;руб.</td>
                        </tr>';
            }


            $view .= '</tbody>
                    <tfoot>
                        <tr>
                            <td align="center" colspan="6" class="text-center bg-yellow-lagoc">
                                Стоимость доставки рассчитывается отдельно в зависимости от расстояния до объекта и выбранных товаров. После оформления заказа наш менеджер свяжется с вами по телефону или e-mail для согласования точной стоимости доставки.
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="bg-info text-right" colspan="5"><b>Сумма заказа (без учета доставки):</b></td>
                            <td align="right" class="bg-info text-right"><b>'.$cart -> total.'&nbsp;руб.</b></td>
                        </tr>
                    </tfoot>
                </table>
                <br />
                <p align="center">
                    <a href="/products" class="actionButtons btn btn-xs-sm-md btn-default" title="Продолжить покупки">Продолжить покупки</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="/checkout" class="actionButtons btn btn-xs-sm-md btn-success" title="Оформить заказ">Оформить заказ</a>
                </p>';

        }

        return $view;
    }