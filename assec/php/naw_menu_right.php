<div class="block_right">
    <nav class="navigation_block">
        <div class="headers_block">
            <p>Быстрый поиск по категориям</p>
        </div>
        <div class="body_block">
       
            <ul>
                <li> Теги новостей
                    <ol>
                        <li><a onclick="href_ti_n('vuz')">Жизнь ВУЗа</a> </li>
                        <li><a onclick="href_ti_n('uch_now')">Учебные новости</a></li>
                        <li><a onclick="href_ti_n('soc_live')">Социальная жизнь</a></li>
                    </ol>
                </li>
                <li> Страницы
                    <ol>
                        <li><a href="timetable">Расписание занятий</a></li>
                        <li><a href="send_rector">Написать ректору</a></li>
                        <? if (isset($_SESSION['user']) && $_SESSION['user']['class'] == 4) { ?>
                            <li><a href="admin_panels">Админ панель</a></li>
                        <? } ?>

                    </ol>
                </li>

            </ul>

        </div>
    </nav>
</div>