<?php

include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


function registerAction(){
    
  // echo "dd";exit;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
        
    //touch("test.txt");
    //$ds = fopen("test.txt","r+");
    //fwrite($ds, ($resData==null ? "null": "notnull"));
    if(! $resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "Пользователь  с email {$email} уже существует";
    }
    
    if(! $resData){
        
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
        
        //touch("test.txt");
        //$ds = fopen("test.txt","r+");
        //fwrite($ds, $userData['success']);
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['email'] = $email;
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name']: $userData['email'];
        } else {
            
            $resData['success'] = 0;
            $resData['message'] = "Ошибка регистрации";
        }
    }
    
    echo json_encode($resData);
}

function logoutAction(){
    
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    
    Header('Location: /myshop.local/www/');//4.4
}

/**
 * return json  массив данных пользователя 
 */
function loginAction(){
    
//    touch("test.txt");
//    $ds = fopen("test.txt","r+");
//    fwrite($ds, "llll");
    
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
    
    $userData = loginUser($email, $pwd);
    
    if($userData['success']){
        
        $userData = $userData[0];
        
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        
                
        $resData=  $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        
        $resData['success'] = 0;
        $resData['message'] = "Неверный логин или пароль";
    }
    
   //   touch("test.txt");
    //$ds = fopen("test.txt","r+");
   //fwrite($ds, print_r(json_encode($resData), true));
    
    echo json_encode($resData);
}

function indexAction($smarty){
    
    if(! isset($_SESSION['user'])){
        
        header("Location: /myshop.local/www/");
    }
    
    $rsCategories = getAllMainCatsWithChildren();
    
    //получаем список заказов
    $rsUserOrders = getCurUserOrders();
    
    
   // d($rsUserOrders);
    
    $smarty->assign('pageTitle','Страниц пользователя');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsUserOrders', $rsUserOrders);
    
    loadTemplate($smarty,'header');
    loadTemplate($smarty,'user');
    loadTemplate($smarty,'footer');
            
}

function updateAction(){
    
    if(! isset($_SESSION['user'])){
        redirect('/myshop.local/www/');
    }//Если польователь не залогинился, выходим
    
    $resData = array();
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ?  $_REQUEST['name'] : null;
    $pwd1 = isset($_REQUEST['pwd1']) ?  $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ?  $_REQUEST['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ?  $_REQUEST['curPwd'] : null;
    
    
     
            
    $curPwdMD5 = md5($curPwd);
    
//    touch("test.txt");
//            $ds = fopen("test.txt","r+");
//            fwrite($ds, print_r($curPwdMD5."=cur~SESS=".$_SESSION['user']['pwd'], true));
            
//                touch("test.txt");
//            $ds = fopen("test.txt","r+");
//            fwrite($ds, print_r($curPwdMD5, true));
            
//                        touch("test.txt");
//            $ds = fopen("test.txt","r+");
//            fwrite($ds, print_r( $_SESSION['user']['pwd']."=md5(z)", true));
    if(! $curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)){
        
//            touch("test.txt");
//            $ds = fopen("test.txt","r+");
//            fwrite($ds, print_r($_SESSION['user']['pwd']."=".$curPwdMD5."=md5(".$curPwd, true));
        
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароь не верен';
        echo json_encode($resData);
        return false;
    }
    

    
    $res = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
    
   
         
                touch("testSESS.txt");
            $ds = fopen("testSESS.txt","r+");
            fwrite($ds, print_r($_SESSION['user']['pwd'], true));

            
    if($res){
         
        
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены.';
        $resData['userName'] = $name;
        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        
        $newPwd = $curPwdMD5;
    if($pwd1 && ($pwd1==$pwd2)){
        $newPwd = md5($pwd1);
    }
        
        $_SESSION['user']['pwd'] = $newPwd;
//$curPwdMD5;                
//md5($pwd1);
                
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
    } else {
          $resData['success'] = 0;
          $resData['message'] = 'Ошибка сохранения данных.';
    }

    echo json_encode($resData);
    
    
    
}