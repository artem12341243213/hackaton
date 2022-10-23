<? headers("Сообщние ректору") ?>

<div class="block_left">
    <div class="block_new message_rector">
        <div class="new_header">Сообщение к ректору</div>
        <div class="new_body">

            <? if (isset($_SESSION['user'])) { ?>
                <div class="new_body__header display_none">
                    <p>Введите ФИО</p>
                    <input type="text" class="login_us" id="firstName_block_send_r" placeholder="Фамилия" value="<? echo $_SESSION['user']['firstName'] ?>">
                    <input type="text" class="login_us" id="name_block_send_r" placeholder="Имя" value="<? echo $_SESSION['user']['name'] ?>">
                    <input type="text" class="login_us" id="lastName_block_send_r" placeholder="Отчество" value="<? echo $_SESSION['user']['lastName'] ?>">
                </div>
            <? } else { ?>
                <div class="new_body__header">
                    <p>Введите ФИО</p>
                    <input type="text" class="login_us" id="firstName_block_send_r" placeholder="Фамилия">
                    <input type="text" class="login_us" id="name_block_send_r" placeholder="Имя">
                    <input type="text" class="login_us" id="lastName_block_send_r" placeholder="Отчество">
                </div>
            <? } ?>

            <div class="new_body__header">
                <p>Тема сообщения </p> <input type="text" placeholder="Тема сообщения" id="thema_teksta">
            </div>
            <div class="new_body__body">
                <p>Ваше сообщение </p>
                <textarea cols="30" rows="10" placeholder="Само обращение" id="textarea_box_text"></textarea>
            </div>
        </div>
        <div class="button_send_rectors">
            <button onclick="ot_mi_rector_send_m()">Отправить</button>
        </div>
    </div>

    <div class="block_new message_rector rectors_un">
        <div class="new_header">Прошлые обращения </div>
        <?

        $vi = mysqli_query($CONNECT, "SELECT DISTINCT `rect_wop`.`id`,`text`,`them`,`otv`,`status`,`id_user` 
        FROM `rect_wop`,`user` where `rect_wop`.`id_user` = `user`.`id` and `rect_wop`.`id_user` =" . $_SESSION['user']['id'] . "
        ORDER BY `status`, `id` DESC;");

        if ($vi->num_rows != 0) {
            foreach ($vi as $item) {
        ?>


                <div class="new_body">
                    <div class="new_body__header">
                        <p>Тема сообщения </p>
                        <p class="owadnlk"><? echo $item['them'] ?></p>
                    </div>
                    <div class="new_body__body">
                        <p>Ответ ректора</p>
                        <div>
                            <? echo $item['otv'] ?>
                        </div>
                        <p>Ваше сообщение </p>
                        <div>
                            <? echo $item['text'] ?>
                        </div>

                    </div>
                </div>
                <div class="hr_new_rectors_men"></div>
        <?
            }
        } ?>


    </div>
</div>
</div>

<? foter() ?>