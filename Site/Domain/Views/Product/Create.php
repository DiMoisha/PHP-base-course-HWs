<?php
    function CreateView() {
        return '<script src="/js/controlbtns.js"></script>
                <div class="row">
                    <div class="col-md-12">    
                        <section id="productForm">
                            <form action="/server/products.php" method="post" class="form-horizontal" role="form" enctype = "multipart/form-data">
                                <input type="hidden" id="Action" name="Action" value="create">
                                <input type="hidden" id="ReturnUrl" name="ReturnUrl" value="/addproduct">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="ProductName">Наименование товара</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="ProductName" id="ProductName"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Unit">Единица измерения</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Unit" class="form-control" id="Unit" placeholder="Единица измерения">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Price">Цена, руб.</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Price" class="form-control" id="Price" placeholder="Цена" value = "123.45">
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
                                        <textarea class = "form-control multi-line" rows = "12" name="Descr" id="Descr"></textarea>
                                        <p class="help-block">* введите описание товара в HTML-формате, либо в виде простого текста.</p>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label class="col-md-3 control-label" for="Html_Pg_Title">Заголовок страницы товара</label>
                                    <div class="col-md-9">
                                        <input type="text" name="Html_Pg_Title" class="form-control" id="Html_Pg_Title" placeholder="Заголовок страницы товара" value=" | Купить, цена, описание">
                                        <p class="help-block">* введите максимально краткий заголовок страницы товара (не более 10 слов).</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Html_Mt_Descr">Описание страницы товара</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="Html_Mt_Descr" id="Html_Mt_Descr"></textarea>
                                        <p class="help-block">* введите максимально краткое описание страницы товара.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Html_Mt_Kwrds">Список ключевых слов</label>
                                    <div class="col-md-9">
                                        <textarea class = "form-control multi-line" rows = "3" name="Html_Mt_Kwrds" id="Html_Mt_Kwrds"></textarea>
                                        <p class="help-block">* введите максимально краткий список ключевых слов, по которым поисковые машины будут идентифицировать страницу товара.</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Главное изображение товара</label>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadPic1" accept=".jpg, .jpeg, .png, .gif" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Дополнительное изображение # 1</label>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadPic2" accept=".jpg, .jpeg, .png, .gif" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Дополнительное изображение # 2</label>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadPic3" accept=".jpg, .jpeg, .png, .gif" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Дополнительное изображение # 3</label>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadPic4" accept=".jpg, .jpeg, .png, .gif" />
                                    </div>
                                </div>            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Дополнительное изображение # 4</label>
                                    <div class="col-md-9">
                                        <input type="file" name="uploadPic5" accept=".jpg, .jpeg, .png, .gif" />
                                    </div>
                                    <p class="help-block">* загружайте изображения в формате jpg, jpeg, gif, png</p>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Сохранить" class="btn btn-xs-sm-md btn-success" role="button" title="Сохранить товар">
                                        <a href="" onclick="JavaScript:window.history.back(1); return false;" role="button" class="btn btn-xs-sm-md btn-default pull-right" title="Возврат к списку товаров">
                                            Отмена
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>';
    }