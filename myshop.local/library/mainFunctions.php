<?php
/**
 * Формирование запрашиваемой страницы
 * @param string $controllerName название контроллера
 * @param string $actionName название функции
 * @return Ничего
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    
    include_once PathPrefix.$controllerName.PathPostfix;
    $function = $actionName.'Action';
    $function($smarty);

}

function loadTemplate($smarty, $templateName){
    $smarty->display($templateName.TemplatePostfix);
}

function d($value = null, $die = 1){
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if($die) die;
}

function CreateSmartyRsArray($rs){
    $smartyRs = array();
    while($row = mysql_fetch_assoc($rs)){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

function redirect($str){
    
    $str = "Location: ".$str;
    header($str);exit();
}
