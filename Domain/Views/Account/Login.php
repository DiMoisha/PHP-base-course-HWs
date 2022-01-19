<?php
    function LoginView() {
        return '<div class="row">
                    <div class="col-md-8">
                        <section id="loginForm">
                            <form action="/server/account.php" method="post" class="form-horizontal" role="form" enctype = "multipart/form-data">
                                <input type="hidden" id="Action" name="Action" value="login">
                                <h4>Используйте вашу учетную запись для входа</h4>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Login">Логин</label>
                                    <div class="col-md-10">
                                        <input type="text" name="Login" class="form-control" id="Login" value="'.$_COOKIE['login'].'" placeholder="Логин пользователя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Password">Пароль</label>
                                    <div class="col-md-10">
                                        <input type="password" name="Password" class="form-control" id="Password" placeholder="Пароль">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <div class="checkbox">
                                            <input type="checkbox" id="RememberMe" name="RememberMe" '.($_COOKIE['login'] ? 'checked' : '').'>
                                            <label for="RememberMe">Запомнить меня</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" value="Выполнить вход" class="btn btn-default btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </section>
                        <br>
                        <hr class="bhr">
                        <div>
                            <h6>Если у Вас еще нет учетной записи - зарегистрируйтесь:</h6>
                            <a href="/register" title="Зарегистрироваться на сайте" class="btn btn-default">Регистрация</a>
                        </div>
                    </div>
                </div>';
    }