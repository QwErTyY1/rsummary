<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <link rel="stylesheet" href="<?=base_url("assets/css/normalize.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/bootstrap-theme.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/my.css")?>">

<!--    <script src="--><?//=base_url('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')?><!--" type="text/javascript"></script>-->


</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="header-container" id="headerContainer">
    <header class="wrapper clearfix">
        <h1 class="title" id="home">Главная</h1>
        <nav id="goLoginIsLog">

            <ul class="isLog">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="#" id="isLogout">Выйти</a></li>
                    <li><a href="#" id="isProfile">Личный кабинет</a></li>
                <?php else: ?>
                    <li id="isLogin">

                        <div class="pn-popup-container">
                            <div class="pn-buttons">
                                <button type="button" id="push-login" class="">Войти
                                </button>
                                <button type="button" id="push-register" class="">Регистрация
                                </button>
                            </div>
                        </div>
                    </li>



                <?php endif; ?>
            </ul>
        </nav>
        <nav>
            <ul>

                <li><a href="#">Контакты</a></li>
<!--                <li><a href="#" id="isProfile">Личный кабинет</a></li>-->

            </ul>
        </nav>

    </header>



</div>

<div class="modal fade" id="myModalLogin" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header mH" style="padding:35px 50px;background-color: #229955">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="headerH4"><span class="glyphicon glyphicon-lock"></span> Авторизация</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form class="" method="post" id="signinForm" action="signin">

                    <div class="form-group">

                        <label for="user_mail"><span class="glyphicon glyphicon-user"></span> EMail</label>
                        <input type="email" placeholder="EMail" name="user_mail" class="form-control">
                        <div class="alert alert-danger" id="errorLogin" style="display: none"></div>
                    </div>
                    <div class="form-group">

                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Пароль</label>
                        <input type="password" placeholder="Пароль" name="user_pass" class="form-control">
                        <div class="alert alert-danger" id="errorPsw" style="display: none"></div>
                    </div>

                    <div class="form-group " >

                        <label for="not_robot">Вы робот?</label>
                        <input type="text" class="form-control" id="not_robot" name="not_robot" placeholder="Введите капчу">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="help-block" id="not_robotValid" >Внимательно</div>
                            </div>
                            <div class="col-md-6 pull-right">
                                <div class="alert alert-danger"  id="erRobotH" style="display: none"></div>
                            </div>

                        </div>


                        <div id="goCaptcha">
                            <div id="goTo">
                                <?=$captcha_html;?>
                            </div>
                        </div>
                    </div>


                    <button type="submit" id="btnBtnLogin" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Войти</button>
                </form>
            </div>

        </div>

    </div>
</div>

