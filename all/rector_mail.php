<? headers("Сообщение ректору") ?>



<div class="block_left">

    <?
    $vi = mysqli_query($CONNECT, "SELECT DISTINCT * FROM `rect_wop`  ORDER BY `status`;");
    /*  SELECT DISTINCT `rect_wop`.`id`,`text`,`them`,`otv`,`status`, `user`.`name`,`user`.`firstName`,`user`.`lastName`,`id_user`
     FROM `rect_wop`,`user` where `rect_wop`.`id_user` = `user`.`id` ORDER BY `status` */

    if ($vi->num_rows != 0) {
        foreach ($vi as $item) {
    ?>
            <div class="block_new <? if ($item['status'] == "X") echo "yes_otvet" ?>" id="block_ri_s_<? echo $item["id"] ?>">
                <div class="new_header">Сообщение к ректору</div>
                <div class="new_body">
                    <div class="new_body__header">
                        <p> Кто задал: <span id="studens">
                                <? 
                                $names = explode("=", $item['FIO'])[0] . " " . explode("=", $item['FIO'])[1] . " " . explode("=", $item['FIO'])[2];

                                echo $names ?>

                            </span> <span class="display_none" id="user_id"><? echo $item['id_user'] ?></span></p>
                        <p> Тема: <span id="them"><? echo $item['them'] ?></span></p>

                    </div>

                    <div class="new_body__body">

                        <span class="display_none" id="id_texta"><? echo $item["id"] ?></span>
                        <div class="section_text" title="Текст новости">
                            <span id="text">
                                <p>Текст:</p>
                                <? echo $item['text'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="button_s">
                        <? if ($item['status'] == "X") {                        ?>
                            <p> Ответ дан </p>
                            <button onclick="promis('block_ri_s_<? echo $item['id'] ?>')">Посмотреть</button>
                        <? } else { ?>
                            <button onclick="clist('block_ri_s_<? echo $item['id'] ?>')">Ответить</button>
                        <? } ?>
                    </div>
                </div>
            </div>
    <?
        }
    }
    ?>


    <div class="modul_box_otv display_none">
        <div class="box_one_coms">
            <div class="box_block_otveta">
                <p>Студент: <span id="student_moda"></span> <span class="display_none" id="user_id_modal"></span></p>
                <div class="block_section_header">
                    <p> Тема: <span id="them_modal"></span></p>
                </div>
                <div class="body_w">
                    <p>Текст:</p>

                    <div class="section_text" title="Текст новости">
                        <span id="txt_moda"></span>
                    </div>
                </div>
                <div class="blokc_otveta">
                    <p>Ваш текст:</p>
                    <textarea cols="30" rows="10" id="text_dek_t"></textarea>
                </div>
                <div class="button_otv_modl">
                    <span class="display_none" id="id_texta_modal"></span>
                    <button onclick="send_mail_retors()"> Отправить</button>
                </div>
            </div>
        </div>
    </div>

</div>


<? foter() ?>