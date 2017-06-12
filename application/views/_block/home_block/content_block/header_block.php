<header class="wrapper clearfix">
    <h1 class="title" id="home">Главная</h1>
    <nav id="goLoginIsLog">
        <ul class="isLog">
            <?php if (isset($_SESSION['user_id']) || !empty($_SESSION['user_id']) || isset($signed_in)): ?>
                <li><a href="#" id="isProfile">Личный кабинет</a></li>
                <li ><a id="isLogout" href="#">Выйти</a></li>
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

        </ul>
    </nav>

</header>

