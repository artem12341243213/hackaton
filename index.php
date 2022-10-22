<?php
session_start();
function not_found()
{
    print_r($_SESSION);
}


$name_bd = "hakatons_bd";
$name_user_bd = "hakatons_bd";
$password_user_bd = "hakatons_les_bd_12";

$CONNECT = mysqli_connect('localhost', $name_user_bd, $password_user_bd,  $name_bd);
if (!$CONNECT) print_r("База данных выдала ошибку - проверте");


if ($_SERVER["REQUEST_URI"] == '/') $page = 'home';
else {
    $page       =   substr($_SERVER["REQUEST_URI"], 1);
    $page_mas   =   explode("&", "$page");
    $page       =   $page_mas[0];
    unset($page_mas);
    $mixe       =   0;

    if (!preg_match('/^[A-z0-9]{3,15}$/', $page)) not_found();
}

if (file_exists("all/$page.php")) {
    require_once("all/$page.php");
} else if ((isset($_SESSION['user']) or isset($_SESSION['ADMIN_LOGIN_IN'])) and file_exists("auth/$page.php")) {
    require_once("auth/$page.php");
} else if ((!isset($_SESSION['user']) or isset($_SESSION['ADMIN_LOGIN_IN'])) and file_exists("guest/$page.php")) {
    require_once("guest/$page.php");
} else if (isset($_SESSION['ADMIN_LOGIN_IN'])) {
    if ($page == 'adminPanels')
        include('admin/adminPanels.php');
    else
        include("admin/$page.php");
} else {
    http_response_code(404);
    not_found();
}


function headers($hed)
{
    require_once("assec/php/header.php");
}

function foter()
{
    require_once("assec/php/foter.php");
}


/* 

*/