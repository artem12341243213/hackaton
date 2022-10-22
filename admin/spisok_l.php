<? headers("Админ панель") ?>
<div class="block_left">
    <div class="auth_block admin_elems">
        <div class="hed_block">
            <p>Список зарегистрированных пользователей</p>
        </div>
        <div class="up_block_1">
            <? $q =  mysqli_query($CONNECT, "SELECT `id`,`class`,`name`,`firstName`,`lastName` FROM `user`");
            $q = mysqli_fetch_all($q);
            $i = 1;
            foreach ($q as $item) {
            ?>
                <div class="coll_3" id="user_<? echo $item[0] ?>">
                    <div class="block">
                        <? echo $i . ") " . $item[2] ?> <? echo $item[3] ?> <? echo $item[4] ?>
                    </div>
                    <div class="block">
                        <? switch ($item[1]) {
                            case 1:
                                echo 'Сотрудник';
                                break;
                            case 2:
                                echo 'Преподаватель';
                                break;
                            case 3:
                                echo 'Студент';
                                break;
                            case 4:
                                echo 'Админ';
                                break;
                        } $i++ ?>
                    </div>
                </div>

            <? } ?>
        </div>

        <div class="down_block">
            <a href="admin_panels">Назад</a>

        </div>
    </div>

</div>


<? foter() ?>