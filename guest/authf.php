<? headers("Авторизация") ?>

<div class="block_left">
    <div class="auth_block">
        <div class="hed_block">
            <p>Авторизация</p>
        </div>
        <div class="up_block">
            <div class="block_login">
                <p>Логин</p>
                <span class="error_text_auth display_none">Логин не существует</span>
                <input type="text" class="login_us" id="login" value="a123">
            </div>

            <div class="block_password">
                <p>Пароль</p>
                <span class="error_text_auth display_none">Пароль не верный</span>
                <input type="text" class="login_us" id="pass" value="123456">
            </div>
        </div>
        <div class="down_block">
            <button onclick="autiziren()">Войти</button>
            <span>
                <a href="register">Регистрация</a>
            </span>
        </div>
    </div>

</div>


<? foter() ?>