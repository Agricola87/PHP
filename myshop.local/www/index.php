<?php

session_start();

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
} 

include_once '../config/config.php';
include_once '../config/db.php';
include_once '../library/mainFunctions.php';
header('Content-type: text/html; charset=utf-8');

$controllerName = isset( $_GET['controller'])? ucfirst($_GET['controller']):'Index';

$actionName = isset( $_GET['action']) ? ucfirst($_GET['action']):'index';

if(isset($_SESSION['user'])){
    $smarty->assign('arUser', $_SESSION['user']);
}

$smarty->assign('cartCntItems', count($_SESSION['cart']));


loadPage($smarty, $controllerName, $actionName);