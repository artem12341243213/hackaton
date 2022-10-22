<?php
print_r($_POST);
if (isset($_POST['send_rectors_f']) and $_POST['send_rectors_f'] = 1) {
    if (mysqli_query($CONNECT, "UPDATE `rect_wop` SET `otv` = '" . $_POST['text_rectors'] . "' ,`status`='X' WHERE `rect_wop`.`id` = " . $_POST['id_send'])) print(1);
    else print(0);
} else if (isset($_POST['send_rectors_mi_f']) and $_POST['send_rectors_mi_f'] = 1) {

    if (mysqli_query($CONNECT, " INSERT INTO `rect_wop` (`id`, `text`, `otv`, `them`, `status`, `id_user`, `FIO`) 
VALUES (NULL, '" . $_POST['text'] . "', NULL, '" . $_POST['them'] . "', 'R', NULL, '" . $_POST['name'] . "') ")) print(1);
    else print(0);
} else if (isset($_POST['adminis_forms_f']) and $_POST['adminis_forms_f'] = 1) {

    $_SESSION['ADMIN_LOGIN_IN'] = 1;
}
