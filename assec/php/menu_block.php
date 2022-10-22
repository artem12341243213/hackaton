<nav class="header_main">
    <div class="list">
        <ul class="menus">
            <li class="button_link"><a href="home"> Главная</a></li>
            <li class="button_link"><a href="timetable"> Расписание</a></li>
            <li class="button_link"><a href="send_rector"> Обращение</a></li>
            <li class="button_link"><a href="rector_mail"> Преподаватели</a></li>
            <li class="button_link">
                <? if (!isset($_SESSION['user'])) { ?>
                    <a href="authf"> Вход</a>
                <? } else { ?>
                    <a href="prof"> Профиль</a>
                <? } ?>
            </li>
        </ul>
    </div>
</nav>