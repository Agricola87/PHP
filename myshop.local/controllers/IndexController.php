<?php

include_once '../models/CategoriesModel.php';;
include_once '../models/ProductsModel.php';;

function TestAction(){
    echo 'indexController.php>testAction';
}
/**
 * 
 * @param type $smarty
 * 
 * Контроллер страницы категорий
 */
function IndexAction($smarty){
    
    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getLastProducts(16);
    
    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories',$rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
//d($_SERVER['DOCUMENT_ROOT']);exit;
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
    
}