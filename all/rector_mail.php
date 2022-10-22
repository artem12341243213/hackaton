<? headers("Сообщение ректору") ?>



<div class="block_left">

    <?
    $vi = mysqli_query($CONNECT, "SELECT DISTINCT `rect_wop`.`id`,`text`,`them`,`otv`,`status`, `user`.`name`,`user`.`firstName`,`user`.`lastName`
     FROM `rect_wop`,`user` where `rect_wop`.`id_user` = `user`.`id` GROUP BY `status`");

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
                            <div class="miOsImOd">
                                <button>Ответить</button>
                                <button>Пометить прочитанным</button>
                            </div>
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
                <p>Студент: <span id="name_student"></span></p>
                <div class="block_section_header">
                    <p> Тема: </p>
                </div>
                <div class="body_w">
                    <div class="section_text" title="Текст новости">
                        <p>Текст: </p>

                    </div>
                </div>
                <p>Вы:</p>
            </div>
        </div>
    </div>

</div>


<? foter() ?>