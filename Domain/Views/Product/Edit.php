<?php
    function EditView($product) {
        $view = '<script src="/js/controlbtns.js"></script>
                <div class="row">
                    <div class="col-md-12">    
                        <section id="productForm">
                            <form action="/server/products.php" method="post" class="form-horizontal" role="form" enctype = "multipart/form-data">
                                <input type="hidden" id="Action" name="Action" value="edit">
                                <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/editproduct">
                                <input type="hidden" id="ProductId" name="ProductId" value="'.$product -> product -> productId.'">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ProductName">Наименование товара</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="ProductName" id="ProductName" required>'.$product -> product -> productName.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Unit">Единица измерения</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Unit" class="form-control" id="Unit" placeholder="Единица измерения" value="'.$product -> product -> unit.'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Price">Цена, руб.</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Price" class="form-control" id="Price" placeholder="Цена" value = "'.$product -> product -> price.'">
                                        <p class="help-block">* дробную часть цены вводите через точку.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Descr">Описание товара, можно html</label>
                                    <div class="col-md-9">
                                        <div style="padding-bottom:5px;">
                                            <input type="button" value="Заголовок" onclick="insert_h3('."'Descr'".')" title="Вставить заголовок" />
                                            <input type="button" value="Ссылка" onclick="insert_Link('."'Descr'".')" title="Вставить ссылку" />
                                            <input type="button" value="Картинка" onclick="insert_Img('."'Descr'".')" title="Вставить картинку" />
                                            <input type="button" value="Строка жирным шрифтом" onclick="insert_Strong('."'Descr'".')" title="Вставить строку выделенную жирным шрифтом" />
                                            <input type="button" value="Перенос строки" onclick="insert_Br('."'Descr'".')" title="Вставить перенос строки" />
                                            <input type="button" value="Разделитель" onclick="insert_Hr('."'Descr'".')" title="Вставить разделительную линию" />
                                            <input type="button" value="Отступ" onclick="insert_4p('."'Descr'".')" title="Вставить отступ строки" />
                                        </div>
                                        <textarea class = "form-control multi-line" rows = "12" name="Descr" id="Descr">'.$product -> product -> descr.'</textarea>
                                        <p class="help-block">* введите описание товара в HTML-формате, либо в виде простого текста.</p>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label" for="Html_Pg_Title">Заголовок страницы товара</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Html_Pg_Title" class="form-control" id="Html_Pg_Title" placeholder="Заголовок страницы товара" value="'.$product -> product -> html_pg_title.'">
                                        <p class="help-block">* введите максимально краткий заголовок страницы товара (не более 10 слов).</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Html_Mt_Descr">Описание страницы товара</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="Html_Mt_Descr" id="Html_Mt_Descr">'.$product -> product -> html_mt_descr.'</textarea>
                                        <p class="help-block">* введите максимально краткое описание страницы товара.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Html_Mt_Kwrds">Список ключевых слов</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="Html_Mt_Kwrds" id="Html_Mt_Kwrds">'.$product -> product -> html_mt_kwrds.'</textarea>
                                        <p class="help-block">* введите максимально краткий список ключевых слов, по которым поисковые машины будут идентифицировать страницу товара.</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <hr /><div class="form-group"><label class="col-md-3 control-label">Текущее главное изображение</label>';
        if (count($product -> productPics) > 0) {
            $view .= '<input id="picName1" name="picName1" type="hidden" value="'.$product -> productPics[0] -> picName.'">
            <img class="img-responsive product-img" src="/images/products/thumbnails/'.$product -> productPics[0] -> picName.'" height="120" width="90" alt="'.$product -> productPics[0] -> picName.'" /> 
            <p>&nbsp;</p><div><label class="col-md-offset-4 col-md-3 control-label">Удалить изображение</label>
            <input class="form-control col-md-3 checkbox" id="delPic1" name="delPic1" type="checkbox" value="true"></div>';
        } else {
            $view .= 'Нет изображения';
        }
        $view .= '<p>&nbsp;</p><div class="col-md-9"><input type="file" name="uploadPic1" accept=".jpg, .jpeg, .png, .gif" />
                  <p class="help-block">* загружайте изображения в формате jpg, jpeg, bmp, gif, png</p></div></div>';
        $view .= '<hr /><div class="form-group"><label class="col-md-3 control-label">Дополнительное изображение # 1</label>';
        if (count($product -> productPics) > 1) {
            $view .= '<input id="picName2" name="picName2" type="hidden" value="'.$product -> productPics[1] -> picName.'">
            <img class="img-responsive product-img" src="/images/products/thumbnails/'.$product -> productPics[1] -> picName.'" height="120" width="90" 
            alt="'.$product -> productPics[1] -> picName.'" /> 
            <p>&nbsp;</p><div><label class="col-md-offset-4 col-md-3 control-label">Удалить изображение</label>
            <input class="form-control col-md-3 checkbox" id="delPic2" name="delPic2" type="checkbox" value="true"></div>';
        } else {
            $view .= 'Нет изображения';
        }
        $view .= '<p>&nbsp;</p><div class="col-md-9"><input type="file" name="uploadPic2" accept=".jpg, .jpeg, .png, .gif" />
        <p class="help-block">* загружайте изображения в формате jpg, jpeg, bmp, gif, png</p></div></div>';
        $view .= '<hr /><div class="form-group"><label class="col-md-3 control-label">Дополнительное изображение # 2</label>';
        if (count($product -> productPics) > 2) {
            $view .= '<input id="picName3" name="picName3" type="hidden" value="'.$product -> productPics[2] -> picName.'">
            <img class="img-responsive product-img" src="/images/products/thumbnails/'.$product -> productPics[2] -> picName.'" height="120" width="90" 
            alt="'.$product -> productPics[2] -> picName.'" /> 
            <p>&nbsp;</p><div><label class="col-md-offset-4 col-md-3 control-label">Удалить изображение</label>
            <input class="form-control col-md-3 checkbox" id="delPic3" name="delPic3" type="checkbox" value="true"></div>';
        } else {
            $view .= 'Нет изображения';
        }
        $view .= '<p>&nbsp;</p><div class="col-md-9"><input type="file" name="uploadPic3" accept=".jpg, .jpeg, .png, .gif" />
        <p class="help-block">* загружайте изображения в формате jpg, jpeg, bmp, gif, png</p></div></div>';
        $view .= '<hr /><div class="form-group"><label class="col-md-3 control-label">Дополнительное изображение # 3</label>';
        if (count($product -> productPics) > 3) {
            $view .= '<input id="picName4" name="picName4" type="hidden" value="'.$product -> productPics[3] -> picName.'">
            <img class="img-responsive product-img" src="/images/products/thumbnails/'.$product -> productPics[3] -> picName.'" height="120" width="90" 
            alt="'.$product -> productPics[3] -> picName.'" /> 
            <p>&nbsp;</p><div><label class="col-md-offset-4 col-md-3 control-label">Удалить изображение</label>
            <input class="form-control col-md-3 checkbox" id="delPic4" name="delPic4" type="checkbox" value="true"></div>';
        } else {
            $view .= 'Нет изображения';
        }
        $view .= '<p>&nbsp;</p><div class="col-md-9"><input type="file" name="uploadPic4" accept=".jpg, .jpeg, .png, .gif" />
        <p class="help-block">* загружайте изображения в формате jpg, jpeg, bmp, gif, png</p></div></div>';
        $view .= '<hr /><div class="form-group"><label class="col-md-3 control-label">Дополнительное изображение # 4</label>';
        if (count($product -> productPics) > 4) {
            $view .= '<input id="picName5" name="picName5" type="hidden" value="'.$product -> productPics[4] -> picName.'">
            <img class="img-responsive product-img" src="/images/products/thumbnails/'.$product -> productPics[4] -> picName.'" height="120" width="90" 
            alt="'.$product -> productPics[4] -> picName.'" /> 
            <p>&nbsp;</p><div><label class="col-md-offset-4 col-md-3 control-label">Удалить изображение</label>
            <input class="form-control col-md-3 checkbox" id="delPic5" name="delPic5" type="checkbox" value="true"></div>';
        } else {
            $view .= 'Нет изображения';
        }
        $view .= '<p>&nbsp;</p><div class="col-md-9"><input type="file" name="uploadPic5" accept=".jpg, .jpeg, .png, .gif" />
        <p class="help-block">* загружайте изображения в формате jpg, jpeg, bmp, gif, png</p></div></div>';
        $view .= '<hr /><div class="form-group"><div class="col-md-12"><input type="submit" value="Сохранить" class="btn btn-xs-sm-md btn-success" role="button" title="Сохранить товар">
                  <a href="" onclick="JavaScript:window.history.back(1); return false;" role="button" class="btn btn-xs-sm-md btn-default pull-right" title="Возврат к списку товаров">
                  Отмена</a></div></div></form></section></div></div>';

        return $view;
    }


