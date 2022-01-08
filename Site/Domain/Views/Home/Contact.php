﻿<?php
    function ContactView() {
        return '<div class="vcard" itemscope itemtype="http://schema.org/LocalBusiness">
            <adress id="contact-card">
                <h2>
                    <span class="category hidden">Завод</span>&nbsp;
                    <span class="fn org" itemprop="name">ООО "ЛАГОС"</span>
                </h2>
                <div class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <strong>
                        Адрес:
                        <span class="locality" itemprop="addressLocality">Россия, Московская область, Люберецкий район, п. Красково</span>,&nbsp;
                        <span class="street-address" itemprop="streetAddress">ул. 2-ая Заводская, д. 2А</span>
                    </strong>
                </div>
                <div class="tel">
                    <strong>
                        Телефон:
                        <abbr class="value" title="+ 7-910-411-35-02" itemprop="telephone">8-910-411-35-02</abbr>
                    </strong>
                </div>
                <div class="whrs">
                    <strong>
                        Мы работаем: <time class="workhours" itemprop="openingHours" datetime="Mo-Su">с 8-00 до 17-00 с пн-вс</time>
                    </strong>
                </div>
                <span class="url">
                    <span class="value-title" title="http://www.lagoc.ru"> </span>
                </span>
            </adress>
            <img class="img-responsive" src="/images/contact/plant.jpg" />
            <p>&nbsp;</p>
            <div>
                <h3>Диспетчерская</h3>
                <p>
                    <span itemprop="member">
                        <strong>
                            <abbr class="value" title="+ 7-910-411-35-04" itemprop="telephone">8-910-411-35-04</abbr>
                        </strong>
                        <br />
                        <strong>e-mail:</strong>
                        <a class="email" href="mailto: lagos99@mail.ru ; lagos-ABZ@mail.ru" itemprop="email">
                            lagos99@mail.ru ; lagos-ABZ@mail.ru
                        </a>
                    </span>
                </p>
                <h3>Диспетчерская эмульсия</h3>
                <p>
                    <span itemprop="member">
                        <strong>
                            <abbr class="value" title="+ 7-910-411-35-03" itemprop="telephone">8-910-411-35-03</abbr>
                        </strong>
                        <br />
                        <strong>e-mail:</strong>
                        <a class="email" href="mailto: lagos99@mail.ru ; lagos-ABZ@mail.ru" itemprop="email">
                            lagos99@mail.ru ; lagos-ABZ@mail.ru
                        </a>
                    </span>
                </p>
                <h3>По вопросам о холодных смесях</h3>
                <p>
                    <span itemprop="member">
                        <strong>
                            <abbr class="value" title="+7-903-212-64-36" itemprop="telephone">+7-903-212-64-36</abbr>
                        </strong>
                        <br />
                        <strong>e-mail:</strong>
                        <a class="email" href="mailto: lagos99@mail.ru ; lagos-ABZ@mail.ru" itemprop="email">
                            lagos99@mail.ru ; lagos-ABZ@mail.ru
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <p>&nbsp;</p>
        <hr />
        <h3 class="text-center">ООО "ЛАГОС" на карте</h3>
        <div id="ya-map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A453697a6dcedabc65e5b1f6cb2c38a0fbf6bb6ad3b07afbed7f69bd99b681ed8&amp;width=620&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>    
        </div>';
    }