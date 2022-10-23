<?php
// print_r($_POST);
if (isset($_POST['send_rectors_f']) and $_POST['send_rectors_f'] = 1) {
    if (mysqli_query($CONNECT, "UPDATE `rect_wop` SET `otv` = '" . $_POST['text_rectors'] . "' ,`status`='X' WHERE `rect_wop`.`id` = " . $_POST['id_send'])) print(1);
    else print(0);
} else if (isset($_POST['send_rectors_mi_f']) and $_POST['send_rectors_mi_f'] = 1) {
    $mi = NULL;
    if (isset($_SESSION['user']['id'])) $mi = $_SESSION['user']['id'];

    if (mysqli_query($CONNECT, " INSERT INTO `rect_wop` (`id`, `text`, `otv`, `them`, `status`, `id_user`, `FIO`) 
VALUES (NULL, '" . $_POST['text'] . "', NULL, '" . $_POST['them'] . "', 'R', $mi, '" . $_POST['name'] . "') ")) print(1);
    else print(0);
} else if (isset($_POST['adminis_forms_f']) and $_POST['adminis_forms_f'] = 1) {

    $_SESSION['ADMIN_LOGIN_IN'] = 1;
} else if (isset($_POST['admin_element_f']) and $_POST['admin_element_f'] = 1) {

    switch ($_POST['doint']) {
        case 'elems_1':
            go('spisok_l');
            break;
        case 'elems_2':
            go('new_block');
            break;
        case 'elems_3':
            go('spisok_l');
            break;
        case 'elems_4':
            go('rector_mail');
            break;
        case 'exit':
            unset($_SESSION['ADMIN_LOGIN_IN']);
            go('home');
            break;
    }
} else if (isset($_POST['exit_user_f']) and $_POST['exit_user_f'] = 1) {
    unset($_SESSION['user']);
    go("home");
} else if (isset($_POST['edit_items']) and $_POST['edit_items'] = 1) {

    if ($_FILES != null) {
        $img_product = '';
        foreach ($_FILES as $item) {
            $uploads = 'assec/images/product';
            if ($item["error"] == 0) {
                $tmp_name = $item["tmp_name"];
                $name = basename($item["name"]);
                move_uploaded_file($tmp_name, "$uploads/$name");
                $file = $item["name"];
                $img_product .= "|" . $file;
            }
        }
        $img_mass = $img_product;
    }

    $header = $_POST['header'];
    $text = $_POST['text'];

    mysqli_query($CONNECT, "INSERT INTO `New` (`hesh`, `text`, `them`, `img`)
     VALUES ('" . $_POST['hesh'] . "', '" . $text . "', '" . $header . "', '" . $img_mass . "')");

    go("new_block");
} else if (isset($_POST['items_ti_f_no_f']) and $_POST['items_ti_f_no_f'] = 1) {
    $d = mysqli_query($CONNECT, "SELECT * FROM `New` WHERE `hesh` = '" . $_POST['tips'] . "' ORDER by `id` DESC");
    if (($d->num_rows) != 0) {
        $d = mysqli_fetch_all($d);
        print_r('{"masive":[' . json_encode($d) . ']}');
    }
}
