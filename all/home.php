<? headers("Главная") ?>


<?

$data = mysqli_query($CONNECT, "SELECT * FROM `New` ORDER BY `id` DESC");


?>
<div class="block_left">
    <? //	id		
    if (($data->num_rows) != 0) {
        $data = mysqli_fetch_all($data);
        foreach ($data as $lios) {
    ?>
            <div class="block_new" id="Block_now_id_<? echo $lios[0] ?>">
                <div class="new_header" data-teg="<? echo  $lios[1] ?>">Новости СКФ МТУСИ <span onclick="href_ti_n('<? echo $lios[1] ?>')">
                        <?
                        switch ($lios[1]) {
                            case 'vuz':
                                echo "#Жизнь ВУЗа";
                                break;
                            case 'uch_now':
                                echo "#Учебные новости";
                                break;
                            case 'soc_live':
                                echo "#Социальная жизнь";
                                break;
                        }
                        ?></span></div>

                <div class="new_body">
                    <div class="new_body__header">
                        <p><? echo $lios[3] ?></p>
                    </div>
                    <div class="new_body__body">
                        <div class="section_img">
                            <img src="assec/img/<? print_r(str_replace("|", "", $lios[4])) ?>" alt="Фото новости">
                        </div>
                        <div class="section_text" title="Текст новости">
                            <? echo $lios[2] ?>
                        </div>
                        <? if (isset($_SESSION['user']) and $_SESSION['user']['class'] == 4) { ?>
                            <p style="color:red; cursor:pointer;" onclick="remove_now_s(<? echo $lios[0] ?>)">Удалить</p>
                        <? } ?>
                    </div>
                </div>
            </div>
        <?
        }
    } else { ?>
        ДА
    <? } ?>

</div>

</div>


<? foter() ?>