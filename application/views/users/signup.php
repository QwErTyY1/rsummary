<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid" id="thisCont">
    <div class="container">

    <div class="alert alert-danger" id="errors" style="display: none"></div>
        <div class="col-md-12">

                <h2>Регистрация</h2>

            <form method="post" action="register" id="registerForm">
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Введите имя пользователя">
               <div class="row">
                <div class="col-md-5">
                    <div class="help-block" id="user_nameValid" >Не менее 4 символов, букв или цифр</div>
                </div>
                   <div class="col-md-6 pull-right">
                       <div class="alert-warning valid" id="erName" style="display: none"></div>
                   </div>

               </div>


            </div>
            <div class="form-group">
                <label for="sure_name">Фамилия пользователя</label>
                <input type="text" class="form-control" id="sure_name" name="sure_name" placeholder="Введите фамилию пользователя">

                <div class="row">
                    <div class="col-md-5">
                        <div class="help-block" id="user_surnameValid" >Не менее 4 символов, букв или цифр</div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="alert-warning valid" id="erSure_name" style="display: none"> DFEAFEfaeafafaef</div>
                    </div>

                </div>


            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="user_email" placeholder="Введите адрес электронной почты">

                <div class="row">
                    <div class="col-md-5">
                        <div class="help-block" id="user_emailValid" >Действительный адрес электронной почты</div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="alert-warning valid" id="erEmail" style="display: none"> DFEAFEfaeafafaef</div>
                    </div>

                </div>


            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="user_password" placeholder="Введите пароль">

                <div class="row">
                    <div class="col-md-5">
                        <div class="help-block" id="user_passValid" >Не менее 6 символов</div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="alert-warning valid" id="erPass" style="display: none"> DFEAFEfaeafafaef</div>
                    </div>

                </div>



            </div>
            <div class="form-group">
                <label for="password_confirm">Подтвердите Пароль</label>
                <input type="password" class="form-control" id="password_confirm" name="user_pass_check" placeholder="Подтвердите ваш пароль">

                <div class="row">
                    <div class="col-md-5">
                        <div class="help-block" id="user_check_passValid" >Должен соответствовать вашему паролю</div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="alert-warning valid"  id="erRePass" style="display: none"> DFEAFEfaeafafaef</div>
                    </div>

                </div>


            </div>
                <div class="form-group">
                <label for="user_country">Страна</label>
                <input type="text" class="form-control" id="user_country" name="user_country" placeholder="Введите вашу страну">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="help-block" id="user_countryValid" >Не менее 6 символов</div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="alert-warning valid" id="erCountry" style="display: none"> DFEAFEfaeafafaef</div>
                        </div>

                    </div>


            </div>
                <div class="form-group">
                <label for="user_city">Город</label>
                <input type="text" class="form-control" id="user_city" name="user_city" placeholder="Введите ваш город">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="help-block" id="user_cityValid" >Не менее 6 символов</div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="alert-warning valid" id="erCity" style="display: none"> DFEAFEfaeafafaef</div>
                        </div>

                    </div>


            </div>
                <div class="form-group">
                <label for="user_address">Адресс</label>
                <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Введите ваш аддрес">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="help-block" id="user_addressValid" >Не менее 6 символов</div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="alert-warning valid" id="erAddress" style="display: none"> DFEAFEfaeafafaef</div>
                        </div>

                    </div>


            </div>
                <div class="form-group">
                <label for="user_date_of_birth">Дата рождения</label>
                <input type="date" class="form-control" id="user_date_of_birth" name="user_date_of_birth" placeholder="Введите дату своего рождения">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="help-block" id="user_date_of_birthValid" >Не менее 6 символов</div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="alert-warning valid" id="erBirth" style="display: none"> DFEAFEfaeafafaef</div>
                        </div>

                    </div>

            </div>
                <div class="form-group">
                <label for="user_postcode">Почтовый индекс</label>
                <input type="number"  class="form-control" id="user_postcode" name="user_postcode" placeholder="Ваш почтовый индекс">


                    <div class="row">
                        <div class="col-md-5">
                            <div class="help-block" id="user_postcodeValid" >Не менее 6 символов</div>
                        </div>
                        <div class="col-md-6 pull-right">
                            <div class="alert-warning valid" id="erPostcode" style="display: none"> DFEAFEfaeafafaef</div>
                        </div>

                    </div>


                </div>
            <div class="form-group " >

                <label for="not_robot">Вы робот?</label>
                <input type="text" class="form-control" id="not_robot" name="not_robot" placeholder="Введите капчу">

                <div class="row">
                    <div class="col-md-5">
                        <div class="help-block" id="not_robotValid" >Внимательно</div>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="alert-warning valid"  id="erRobot" style="display: none"> DFEAFEfaeafafaef</div>
                    </div>

                </div>


                <div id="goCaptcha">
                      <div id="goTo">
                    <?=$captcha_html;?>
                </div>
                      </div>
            </div>



            <div class="form-group">
                <button type="submit" name="sRegistration" class="btn btn-default" id="sRegistration">Регистрация</button>
            </div>

            </form>
        </div>
</div>


</div>


