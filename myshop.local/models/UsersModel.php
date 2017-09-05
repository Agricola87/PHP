<?php

function registerNewUser($email, $pwdMD5, $name, $phone, $adress){
    
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $name = htmlspecialchars(mysql_real_escape_string($name));
    $phone = htmlspecialchars(mysql_real_escape_string($phone));
    $adress = htmlspecialchars(mysql_real_escape_string($adress));
 
    $sql = "INSERT INTO users "
            . "(`email`, `pwd`, `name`, `phone`, `adress`) VALUES "
            . "('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}');";
            
    $rs = mysql_query($sql);
    
//     touch("test.txt");
//    $ds = fopen("test.txt","r+");
//    fwrite($ds, ($rs==true ? "+": "notnull"));
    
    if($rs){
        touch("test.txt");
        $sql = "SELECT * FROM users "
                . "WHERE (`email`='{$email}' AND `pwd`='{$pwdMD5}')"
                . " LIMIT 1";
                
                $rs = mysql_query($sql);
                
//                touch("test.txt");
//                $ds = fopen("test.txt","r+");
//                fwrite($ds, $sql);
//                fwrite($ds, ($rs==true ? "+" : "n"));
                
                $rs = CreateSmartyRsArray($rs);
                
//                $p = print_r($rs);    
//                touch("test.txt");
//                $ds = fopen("test.txt","r+");
//                fwrite($ds, $p);
                
//                touch("test.txt");
//                $ds = fopen("test.txt","r+");
//                fwrite($ds, ((isset($rs[0]) ? "i" : "n")));
                
                
                
                if(isset($rs[0])) $rs['success'] = 1;
                else $rs['success'] = 0;

    } else {
        
        $rs['success'] = 0;
    }
    
    return  $rs;
}

function checkRegisterParams($email, $pwd1, $pwd2){
    
    $res = null;
    
    if(! $email){
        $res['success'] = false;
        $res['message'] = "Введите email";
    }
    
    if(! $pwd1){
        $res['success'] = false;
        $res['message'] = "Введите пароль";
    }
    
    if(! $pwd2){
        $res['success'] = false;
        $res['message'] = "Введите повтор пароля";
    }
    
    if($pwd1 != $pwd2){
        $res['success'] = false;
        $res['message'] = "Пароли не совпадают";
    }
    
    return $res;
}

function checkUserEmail($email){
    
    $email = mysql_real_escape_string($email);
    $sql = "SELECT id FROM users WHERE email = '{$email}'";
    
    $rs = mysql_query($sql);
    $rs = CreateSmartyRsArray($rs);
    
    return $rs;
}

function loginUser($email, $pwd){
    
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM users WHERE (email='{$email}' AND pwd = '{$pwd}')";
    $rs = mysql_query($sql);
    
    $rs = CreateSmartyRsArray($rs);
    if(isset($rs[0])){
        $rs['success']=1;
    } else {
        $rs['success'] = 0;
    }
    
    return $rs;
}

function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd){
    
    $email = htmlspecialchars(mysql_real_escape_string($_SESSION['user']['email']));
    $name = htmlspecialchars(mysql_real_escape_string($name));
    $phone = htmlspecialchars(mysql_real_escape_string($phone));
    $adress = htmlspecialchars(mysql_real_escape_string($adress));
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);
    
//Надо проэскейпить ПАРОЛЬ
    
    
    
    $newPwd = null;
    if($pwd1 && ($pwd1==$pwd2)){
        $newPwd = md5($pwd1);
    }
    
    $sql = "UPDATE users SET ";
    
    if($newPwd){
        $sql.="`pwd`='{$newPwd}', ";
    }
    
    $sql.="`name` = '{$name}', "
    . "`phone` = '{$phone}', "
    . "`adress` = '{$adress}' "
    . "WHERE "
            . "`email` = '{$email}' AND `pwd` = '{$curPwd}' "
            . "LIMIT 1";
            
    $rs = mysql_query($sql);        
    
    return $rs;
}

function getCurUserOrders(){
    
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs = getOrdersWithProductsByUser($userId);
    
    return $rs;
}