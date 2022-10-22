<?

if (isset($_POST["login_f"]) and $_POST["login_f"] == 1) {
    $rif = mysqli_query($CONNECT, "SELECT * From `user` where `login` = '" . $_POST["login"] . "'");
    $lest = mysqli_fetch_assoc($rif);
    if (($rif->num_rows) == 0) {
        exit(0);
    } else if ($lest['password'] != $_POST['pass']) {
        exit(0);
    } else {
        $m = [];
        foreach ($lest as $key => $item) {
            $m[$key] = $item;
        }
        $_SESSION['user'] = $m;
        go('home');
    }
} else if (isset($_POST["registers_f"]) and $_POST["registers_f"] == 1) {


    if ($_POST["class"] == "teacher") $m = 1;
    if ($_POST["class"] == "employee") $m = 2;
    if ($_POST["class"] == "student") $m = 3;
    if ($_POST["class"] == "admin") $m = 4;
    if (mysqli_query($CONNECT, "INSERT INTO `user` (`id`, `login`, `password`, `class`, `name`, `firstName`, `lastName`) 
   VALUES (NULL, '" . $_POST["login"] . "', '" . $_POST["pass"] . "', '" . $m . "',
    '" . $_POST["name"] . "', '" . $_POST["firstname"] . "', '" . $_POST["lastname"] . "')")) {
        go('home');
    } else
        print_r(0);
}
