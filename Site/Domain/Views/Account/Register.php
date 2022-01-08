<?php
    function RegisterView() {
        return '<div class="row">
                    <div class="col-md-8">
                        <section id="loginForm">
                            <form action="/server/account.php" method="post" class="form-horizontal" role="form" enctype = "multipart/form-data">
                                <input type="hidden" id="Action" name="Action" value="register">
                                <h4>Создайте новую учетную запись</h4>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Login">Логин</label>
                                    <div class="col-md-10">
                                        <input type="text" name="Login" class="form-control" id="Login" placeholder="Логин пользователя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Password">Пароль</label>
                                    <div class="col-md-10">
                                        <input type="password" name="Password" class="form-control" id="Password" placeholder="Пароль">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="ConfirmPassword">Повторите пароль</label>
                                    <div class="col-md-10">
                                        <input type="password" name="ConfirmPassword" class="form-control" id="ConfirmPassword" placeholder="Повторите пароль">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="UserName">Имя пользователя</label>
                                    <div class="col-md-10">
                                        <input type="text" name="UserName" class="form-control" id="UserName" placeholder="Имя пользователя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Email">E-mail</label>
                                    <div class="col-md-10">
                                        <input type="email" name="Email" class="form-control" id="Email" placeholder="e-mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input type="submit" value="Регистрация" class="btn btn-default btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>';
    }