<div class="block_right">
    <nav class="navigation_block">
        <div class="headers_block">
            <p>Быстрый поиск по категориям</p>
        </div>
        <div class="body_block">
            <ul>
                <li> Теги новостей
                    <ol>
                        <li><a onclick="">Жизнь ВУЗа</a> </li>
                        <li><a onclick="">Учебные новости</a></li>
                        <li><a onclick="">Социальная жизнь</a></li>
                    </ol>
                </li>
                <li> Страницы
                    <ol>
                        <li><a href="timetable">Расписание занятий</a></li>
                        <li><a href="send_rector">Написать ректору</a></li>
                        <li><a onclick="ajx('GLA_all/adminis_forms_f=1')">Админ права</a></li>
                        <? if (isset($_SESSION['ADMIN_LOGIN_IN'])) { ?>
                            <li><a href="admin_panels">Админ ппанель</a></li>
                        <? } ?>

                    </ol>
                </li>

            </ul>

        </div>
    </nav>
</div>