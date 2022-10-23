<? headers('Профиль'); ?>
<?

$s = mysqli_query($CONNECT, "SELECT * FROM `user` WHERE `id` = " . $_SESSION['user']['id']);
$s = mysqli_fetch_assoc($s);

$f = mysqli_query($CONNECT, "SELECT * FROM `classes` WHERE `id` = " . $s['class']);
$f = mysqli_fetch_assoc($f)['name'];

$c = "";
if ($s['class'] == 1) {

    $c = mysqli_query($CONNECT, "SELECT * FROM `group_staff` WHERE `id_table` = " . $s['class']);
    $c = mysqli_fetch_assoc($c)['name'];
} else if ($s['class'] == 2) {

    $c = mysqli_query($CONNECT, "SELECT * FROM `group_teacher` WHERE `id_table` = " . $s['class']);
    $c = mysqli_fetch_assoc($c)['name'];
}

?>

<div class="block_left">
    <div class="auth_block admin_elems">
        <div class="hed_block">
            <p>Профиль</p>
        </div>
        <div class="block_elements_profils">
            <div class="block_img_profils">
                <img src="assec/img/foto_false.jpg" alt="">
            </div>
            <div class="block_user_data">
                <div class="elements_data">
                    <div class="data_fio">
                        <div class="name_last"><? echo $s['name'] . " " . $s['firstName'] ?></div>
                        <div class="ot"><? echo $s['lastName'] ?></div>
                    </div>
                    <div class="block_moduls">
                        <div class="block_groups">
                            <p> <? echo $f  ?></p>
                        </div>
                        <div class="block_group_n">
                            <? if ($s['class'] == 3) { ?>
                                <p>Группа: <? echo $s['group_user'] ?></p>
                            <? } else { ?>
                                <p> <? echo $c ?></p>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button_vi">
            <button onclick="exit_user_acc()"> Выход</button>
        </div>
    </div>
</div>



<? foter() ?>