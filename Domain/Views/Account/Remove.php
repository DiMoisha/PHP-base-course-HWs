<?php
    function RemoveView() {
        return '<div class="row">
                    <div class="col-md-8">
                        <section id="loginForm">
                            <form action="/server/account.php" method="post" class="form-horizontal" role="form">
                                <input type="hidden" id="Action" name="Action" value="remove">
                                <h4>Вы уверены что хотите удалить свою учетную запись?</h4>
                                <hr>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="Login">Логин</label>
                                    <div class="col-md-10">
                                        <input type="text" name="Login" class="form-control" id="Login" value="'.$_COOKIE['loginlogin'].'" placeholder="Логин пользователя">
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
                                        <input type="submit" value="Удалить" class="btn btn-default btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>';
    }