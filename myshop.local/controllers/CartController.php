<?php

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';
include_once '../library/mainFunctions.php';
/**
 * Добавление продукта в корзину
 * 
 * 
 * @return json информация опрации (успех, кол-во элеиентов в корзине)
 * 
 */

function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(! $itemId) return false;
    
    $resData = array();
    
    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
        
        
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
     } else {
         $resData['success'] = 0;
     }
     //d($_SESSION);
     //echo array_search($itemId, $_SESSION['cart']);exit;
     //d($resData);
    
     echo json_encode($resData);
}

function removefromcartAction(){
    
    $itemId = isset($_GET['id']) ? intval($_GET['id']): null;
    if(! $itemId) exit();
    
    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

function indexAction($smarty){
    
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);

    
    //d($rsProducts);
    
    $smarty->assign('pageTitle','Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

function orderAction($smarty){
    
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    
    // если корзина пуста, то перенаправляем в корзину
    if(! $itemsIds){
        redirect("/myshop.local/www/cart/");
        return;
    }
    
    $itemsCnt = array();
    foreach($itemsIds as $item){
        
        //формируем ключ массива
        $postVar = 'itemCnt_'.$item;
        $itemsCnt[$item] =  isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
    
    $rsProducts = getProductsFromArray($itemsIds);
    
    //Добавляем каждому продукту дополнительное поле
    //"realprice" кол-во * цену
    //"cnt" кол-во товара
    
    //&$item чтобы менялся сам массив $rsProducts
    $i = 0;
    foreach($rsProducts as &$item){
        
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt']){
            
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            
            //если товар в корзине с нулем, то удаляем
            unset($rsProducts[$i]);
        }
        $i++;
    }
    
    if(! $rsProducts){
        
        echo "Корзина пустая";
    }
    
    $_SESSION['saleCart'] = $rsProducts;
    
   // d($rsProducts);
    
    $rsCategories = getAllMainCatsWithChildren();
     //hideLoginBox - флаг, чтобы спрятать блок логина
    if(! isset($_SESSION['user'])){
        
        $smarty->assign('hideLoginBox', 1);
    }
    
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
    
}

function saveorderAction(){
    

    
    //Получаем массив покупаемых товаров
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
    
  
    
    if(! $cart){
        $resData['success'] = 0;
        $resData['message'] = 'Нет товаров для заказа';
        echo json_encode($resData);
        return;
    }
    
//    ///////////////////
//    $resData['success'] = 1;
//    $resData['message'] = 'Заказ сохранен';
//    echo json_encode($resData);
//    exit;
//    ///////////////////
    
    $name = $_POST['name'];
    $adress = $_POST['adress'];
    $phone = $_POST['phone'];
    
    $orderId = makeNewOrder($name, $phone, $adress);
  
    
//                touch("test.txt");
//    $fd = fopen("test.txt", "r+");
//    fwrite($fd, print_r($orderId, true));  
    
    
    if(! $orderId){
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создания заказа';
        echo json_encode($resData);
        return;
    }



    
           
    //Сохраняем товары для созданного заказа
    $res = setPurchaseForOrder($orderId, $cart);
    

    
    if($res){    

        $resData['success'] = 1;
        $resData['message'] = 'Заказ сохранен';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесени данных для заказа';
    }
    
 //   touch("test.txt");
 //   $fd = fopen("test.txt", "r+");
 //   fwrite($fd, print_r(json_encode($resData), true)); 
    
    echo json_encode($resData);
}