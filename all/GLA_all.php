<?php

if (isset($_POST['send_rectors_f']) and $_POST['send_rectors_f'] = 1) {
    if (mysqli_query($CONNECT, "UPDATE `rect_wop` SET `otv` = '" . $_POST['text_rectors'] . "' ,`status`='X' WHERE `rect_wop`.`id` = " . $_POST['id_send'])) print(1);
    else print(0);
}
