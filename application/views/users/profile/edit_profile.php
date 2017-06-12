<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Редактировать профиль <small> </small></h1>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <form method="post" action="user/edit_profile">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Управление аккаунтом</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-7 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="username">Ваш логин</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Ваш адрес электронной почты</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="current_password">Текущий пароль</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Введите пароль, если вы хотите его изменить">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Новый пароль</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Введите новый пароль">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirm">Подтвердите новый пароль</label>
                                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Подтвердите новый пароль">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Обновить профиль">
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Удаление аккаунтаt</h3>
                        </div>
                        <div class="panel-body">
                            <p>Если вы хотите удалить свою учетную запись, нажмите кнопку ниже.</p>
                            <p><strong>БЫТЬ ОСТОРОЖЕН! Если вы нажмете ссылку ниже, ваша учетная запись будет немедленно удалена и окончательно удалена. Нет пути назад!</strong></p>
                            <a href="<?= base_url('user/' . $user->user_name . '/delete') ?>" class="btn btn-danger btn-block btn-sm" onclick="return confirm('Вы уверены, что хотите удалить свою учетную запись? Если вы нажмете OK, ваша учетная запись будет немедленно и окончательно удалена.')">Удалить учетную запись</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>