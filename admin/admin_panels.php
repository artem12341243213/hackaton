<? headers("Админ панель") ?>


<div class="block_left">
    <div class="auth_block admin_elems">
        <div class="hed_block">
            <p>Админ панель</p>
        </div>
        <div class="up_block">
            <div class="elems_1">
                <p>Список зарегистрированных пользователей</p> <button class="btn-bl-fl" onclick="admins_button_l('elems_1')">Показать</button>
            </div>
            <div class="elems_2">
                <p>Новостной блок</p> <button class="btn-bl-fl" onclick="admins_button_l('elems_2')">Редактировать</button>
            </div>
            <div class="elems_3">
                <p>Расписания занятий</p> <button class="btn-bl-fl" onclick="admins_button_l('elems_3')">Загрузить файл</button>
            </div>
            <div class="elems_4">
                <p>Список обращений к ректору</p> <button class="btn-bl-fl" onclick="admins_button_l('elems_4')">Показать</button>
            </div>
        </div>

        <div class="down_block">
            <button class="btn-bl-fl" onclick="admins_button_l('exit')">Выйти</button>

        </div>
    </div>

</div>


<? foter() ?>