<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="page-header">
                    <h1>Ваш профиль <?=$profile->user_name;?> <small></small> </h1>
                </div>
            </div>

                <div class="col-md-12">
                    <div class="row">
                        <form enctype="multipart/form-data" action="edit" method="post" id="updateForm">
                            <div class="col-md-8">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Управление аккаунтом</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-7 col-sm-offset-2">
                                                <div class="alert alert-danger" id="errorUpd" style="display: none"></div>
                                                <div class="form-group">
                                                    <label for="user_name">Ваш логин</label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="<?=$profile->user_name;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_surname">Фамилия</label>
                                                    <input type="text" class="form-control" id="user_surname" name="user_surname" placeholder="<?=$profile->user_surname;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_country">Страна</label>
                                                    <input type="text" class="form-control" id="user_country" name="user_country" placeholder="<?=$profile->user_country;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_city">Город</label>
                                                    <input type="text" class="form-control" id="user_city" name="user_city" placeholder="<?=$profile->user_city;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_address">Адрес</label>
                                                    <input type="text" class="form-control" id="user_address" name="user_address" placeholder="<?=$profile->user_address;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_date_of_birth">Дата рождения</label>
                                                    <input type="date" class="form-control" id="user_date_of_birth" name="user_date_of_birth" placeholder="<?=$profile->user_date_of_birth;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_email">Ваш адрес электронной почты</label>
                                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="<?=$profile->user_email;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_postcode">Почтовый индекс</label>
                                                    <input type="number" class="form-control" id="user_postcode" name="user_postcode" placeholder="<?=$profile->user_postcode;?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="user_pass">Текущий пароль</label>
                                                    <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Введите пароль, если вы хотите его изменить">

                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Новый пароль</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Введите новый пароль">

                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirm">Подтвердите новый пароль</label>
                                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Подтвердите новый пароль">

                                                </div>
                                                <input type="submit" id="submitUpdate" class="btn btn-primary" value="Обновить профиль">
                                            </div>
                                        </div><!-- .row -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ваше фото</h3>
                                    </div>
                                    <div class="panel-body">
                                        <img class="img-thumbnail"  alt="" src="./img/photos/<?=$profile->user_photo;?>">
                                        <p><strong>При обновлении старая фотография автоматически удаляется</strong></p>
                                    </div>
                                    <div class="panel-footer">
                                         <span class="btn btn-success btn-file">
                                             <span> <input name="userfile" class="" type="file"> </span>
                                    </span>

                                    </div>

                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Удаление аккаунтаt</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Если вы хотите удалить свою учетную запись, нажмите кнопку ниже.</p>
                                        <p><strong>БЫТЬ ОСТОРОЖЕН! Если вы нажмете ссылку ниже, ваша учетная запись будет немедленно удалена и окончательно удалена. Нет пути назад!</strong></p>
                                                                    <a id="deleteProf" href="<?= base_url('user/' . $profile->user_name . '/delete') ?>" class="btn btn-danger btn-block btn-sm" onclick="return confirm('Вы уверены, что хотите удалить свою учетную запись? Если вы нажмете OK, ваша учетная запись будет немедленно и окончательно удалена.')">Удалить учетную запись</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>



        </div>



