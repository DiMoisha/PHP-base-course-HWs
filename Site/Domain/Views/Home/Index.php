﻿<?php
    function IndexView() {
        return '
        <div class="jumbotron jumbotron-index">
            <h1>ООО "ЛАГОС"</h1>
            <p class="jumbotron-text">Ведущий производитель материалов для строительства и ремонта дорог в Москве и Московской Области. ООО "ЛАГОС" - это современное производство дорожностроительных материалов высокого качества. Используя в своей работе нашу продукцию Вы получаете неизменно превосходный результат.</p>
            <p class="jumbotron-btn-wrapper"><a class="btn btn-primary btn-lg jumbotron-btn" href="/about/" title="О компании" role="button">Подробнее о нас &raquo;</a></p>	
        </div>        
        <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 news-block">
            <h2>Новости</h2>
                <div class="news-block-item-wrapper">
        
                    <a class="news-block-item" href="/news" title="Подробнее"><span class="news-date"><strong>27.12.2021</strong></span><br /><span class="news-title">Поздравляем с наступающим Новым 2022 годом!!!</span></a>
                </div>
                <div class="news-block-item-wrapper">
        
                    <a class="news-block-item" href="/news" title="Подробнее"><span class="news-date"><strong>15.12.2021</strong></span><br /><span class="news-title">Уважаемые клиенты и гости нашего сайта!
        С 15 декабря 2021 года завод закрывается на планово-профилактические работы!
        До новых встреч в Новом году!</span></a>
                </div>
                <div class="news-block-item-wrapper">
        
                    <a class="news-block-item" href="/news" title="Подробнее"><span class="news-date"><strong>15.10.2021</strong></span><br /><span class="news-title"> Уважаемые клиенты и гости нашего сайта! Цены на нашу продукцию меняются с 18 октября 2021г. С новыми ценами Вы можете ознакомиться уже сейчас в разделе "Продукция"!</span></a>
                </div>
                <div class="news-block-item-wrapper">
        
                    <a class="news-block-item" href="/news" title="Подробнее"><span class="news-date"><strong>16.09.2021</strong></span><br /><span class="news-title">Уважаемые клиенты и гости нашего сайта!
        Цены на нашу продукцию меняются с 20 сентября 2021г.
        С новыми ценами Вы можете ознакомиться уже сейчас в разделе продукция или загрузив наш прайс-лист</span></a>
                </div>
                <div class="news-block-item-wrapper">
        
                    <a class="news-block-item" href="/news" title="Подробнее"><span class="news-date"><strong>08.07.2021</strong></span><br /><span class="news-title">Уважаемые клиенты и гости нашего сайта!
        с 12 июля 2021 г. цены на продукцию меняются!
        С новыми ценами вы можете ознакомиться в разделе "Продукция"!</span></a>
                </div>
            <div class="text-center all-news-wrapper">
                <a class="all-news" href="/news/" role="button" title="Список новостей" onclick="alert(`Это не production версия сайта! Некоторые функции могут не работать!`)">Все новости &#187;</a>
            </div>
            <br />
            <br class="hidden-xs" />
            <br class="hidden-xs" />
            <div class="calc-block clearfix">
                <h2>Калькулятор расхода асфальта</h2>
        <script src="/js/calc.js"></script>
        <div class="calc">
            <form method="get" action="" name="calc">
                <table align="center" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr><td colspan="2" align="left"><b>Тип а/б смеси</b></td></tr>
                        <tr>
                            <td colspan="2" align="left" style="padding-bottom:10px;">
                                <select id="calc-asphalt-sel" onchange="Calc.changeType(this)"><option selected="">МА I</option><option>МБ I</option><option>МБ II</option><option>МБ III</option><option>МВ II</option><option>КБ I</option><option>КП I</option><option>Л IV</option><option>ПД II</option><option>ПГ I</option>option>ЩМА-20; ЩМА-15</option><option>ЩМА 20; ЩМА-15 на ПБВ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="250" align="left">Расстояние, м</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="10" name="l" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">Ширина покрытия, м</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="3" name="w" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td align="left">Толщина слоя, см</td>
                            <td align="right">
                                <input class="calc-tf" type="text" onfocus="this.select()" onkeyup="Calc.tfChanged(this)" value="5" name="h" size="5">
                            </td>
                        </tr>
                        <tr>
                            <td class="calc-result" align="left"><b>Расход асфальта составит:&nbsp;&nbsp;</b></td>
                            <td class="calc-result" id="calc-res" align="left"><b>3,540 тонн</b></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
            </div>
        </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/coldasphalt.jpg" data-src="holder.js/300x200" alt="Холодный асфальт">
                                    <div class="caption">
                                        <h3 class="text-center">Холодный асфальт</h3>
                                        <p>Высокое качество и выгодная цена нашего Холодного асфальта, вас приятно удивят. Отгрузим любое количество.</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/coldasphalt/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/asphalt.jpg" data-src="holder.js/300x200" alt="Асфальт">
                                    <div class="caption">
                                        <h3 class="text-center">Асфальт</h3>
                                        <p>Мы производим широкий спектр различных марок Асфальтобетонных смесей (Асфальта). Ознакомтесь с нашим ассортиментом...</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/asphalt/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/emulsion.jpg" data-src="holder.js/300x200" alt="Битумные эмульсии">
                                    <div class="caption">
                                        <h3 class="text-center">Битумные эмульсии</h3>
                                        <p>У нас вы можете приобрести Анионную и Катионную битумные эмульсии. Розлив как на вес, так и в удобной таре</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/emulsion/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/services.jpg" data-src="holder.js/300x200" alt="Дорожное строительство">
                                    <div class="caption">
                                        <h3 class="text-center">Дорожное строительство</h3>
                                        <p>Доверьтесь специалистам!  Мы выполняем работы в области дорожного строительства и ремонта любой сложности.</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/services/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/laboratory.jpg" data-src="holder.js/300x200" alt="Услуги испытательной лаборатории">
                                    <div class="caption">
                                        <h3 class="text-center">Услуги испытательной лаборатории</h3>
                                        <p>Воспользуйтесь услугами нашей сертифицированной испытательной лаборатории. Осуществляем выезды на объекты.</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/laboratory/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="thumbnail thumbnail-index">
                                    <img src="/images/index/delivery.jpg" data-src="holder.js/300x200" alt="Доставка продукции">
                                    <div class="caption">
                                        <h3 class="text-center">Доставка продукции</h3>
                                        <p>Экономьте свое время и деньги! Выполним удобную и быструю доставку заказанной продукции нашим транспортом.</p>
                                        <p class="text-center ">
                                            <a class="btn btn-xs-sm-md btn-primary" href="/delivery/">Узнать больше &#187;</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
        </div>';
    }

    
                

    

    
    
    
    
                