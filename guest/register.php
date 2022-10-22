<? headers("Регистрация") ?>



<div class="block_left">
    <div class="auth_block">
        <div class="hed_block">
            <p>Регистрация</p>
        </div>
        <div class="up_block">
            <div class="block_login">
                <p>Введите ФИО</p>
                <input type="text" class="login_us" id="first_name" placeholder="Фамилия">
                <input type="text" class="login_us" id="name" placeholder="Имя">
                <input type="text" class="login_us" id="last_name" placeholder="Отчество">
            </div>
            <div class="block_login">
                <p>Придумайте логин</p>
                <span class="error_text_auth display_none">Логин занят</span>
                <input type="text" class="login_us" id="login_u">
            </div>

            <div class="block_password">
                <p>Придумайте пароль</p>
                <input type="text" class="login_us" id="pass_u">
            </div>

            <div class="block_password">
                <p>Повтрите пароль</p>
                <span class="error_text_auth display_none">Пароль не совпадает</span>
                <input type="text" class="login_us" id="pass_u2">
            </div>

            <div class="block_cheks">
                <p>Кто вы?</p>
                <div class="les_chek">
                    <span class="error_text_auth display_none">Выберите один элемент из списка</span>
                    <div class="block_chek_radio_button_le display_none">
                        <input type="radio" name="yor" id="check_radio_your_teacher" value="teacher">
                        <input type="radio" name="yor" id="check_radio_your_student" value="student">
                        <input type="radio" name="yor" id="check_radio_your_employee" value="employee">
                    </div>

                    <label for="check_radio_your_teacher" onclick="onRegisters_ragio('check_radio_your_teacher')">Учитель</label>
                    <label for="check_radio_your_student" onclick="onRegisters_ragio('check_radio_your_student')">Студент</label>
                    <label for="check_radio_your_employee" onclick="onRegisters_ragio('check_radio_your_employee')">Сотрудник</label>
                </div>

            </div>
        </div>


        <div class="down_block">
            <button onclick="register()">Регистрация</button>
            <span>
                <a href="authf">У меня есть аккаунт</a>
            </span>
        </div>
    </div>

</div>


<? foter() ?>