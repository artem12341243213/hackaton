<? headers("Сообщение ректору") ?>



<div class="block_left">

    <?
    $vi = mysqli_query($CONNECT, "SELECT DISTINCT `rect_wop`.`id`,`text`,`them`,`otv`,`status`, `user`.`name`,`user`.`firstName`,`user`.`lastName`
     FROM `rect_wop`,`user` where `rect_wop`.`id_user` = `user`.`id` and  `status` = 'R' GROUP BY `status`");

    if ($vi->num_rows != 0) {
        foreach ($vi as $item) {
    ?>

            <div class="block_new <? if ($item['status'] == "X") echo "yes_otvet" ?>" id="block_ri_s_<? echo $item["id"] ?>">
                <div class="new_header">Сообщение к ректору</div>
                <div class="new_body">
                    <div class="new_body__header">
                        <p> Тема: <span id="them"><? echo $item['them'] ?></span></p>
                        <p> Ученик: <span id="studens"><? echo $item['lastName'] . " " . $item['firstName'] . " " . $item['name'] ?></span></p>
                    </div>

                    <div class="new_body__body">
                        <div class="section_text" title="Текст новости">
                            <span id="text">
                                <? echo $item['text'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="button_s">
                        <? if ($item['status'] == "X") {                        ?>
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
                <p>Студент: <span id="student_moda"></span></p>
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
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="button_otv_modl">
                    <button onclick=""> Отправить</button>
                </div>
            </div>
        </div>
    </div>

</div>


<? foter() ?>