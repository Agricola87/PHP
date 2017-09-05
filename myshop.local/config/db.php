<?php

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "trottrot";

$db = mysql_connect($dblocation, $dbuser, $dbpasswd);

if(!$db){
    echo "Ошибка подключения к DB";exit;
}
mysql_set_charset('utf8');
if(!mysql_select_db($dbname, $db)){
    echo "Ошибка подключения к БД";exit;
}
