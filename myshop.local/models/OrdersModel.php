<?php
/**
 * 
 * @param type $name
 * @param type $phone
 * @param type $adress
 * @return integer Id
 */
function makeNewOrder($name, $phone, $adress){
    
    

    
    
    $userId = $_SESSION['user']['id'];
    $comment = "id пользователя: {$userId}<br />"
    . "Имя: {$name}<br />"
    . "Телефон: {$phone}<br />".
    "Адрес: {$adress}<br />";
    

    
    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];
    
    
            
    $sql = "INSERT INTO "
            . "orders (`user_id`, `date_created`, `date_payment`,"
            . "`status`, `comment`, `user_ip`) "
            . "VALUES ('{$userId}', '{$dateCreated}', null, "
            . "'0', '{$comment}', '{$userIp}')";
            
            
    $rs = mysql_query($sql);
    


    
    //не лучший способ получения последнего id
    if($rs){
        $sql = "SELECT id "
                . "FROM orders "
                . "ORDER BY id DESC "
                . "LIMIT 1";
       
        $rs = mysql_query($sql);
        
//    $orderId = $sql;
       
        $rs = CreateSmartyRsArray($rs);
        if(isset($rs[0])){
           
            return $rs[0]['id'];
        }
        
//            touch("test.txt");
//    $fd = fopen("test.txt", "r+");
//    fwrite($fd, print_r("lll", true));  
    }
    
    return false;
}

function getOrdersWithProductsByUser($userId){
    
    $userId = intval($userId);
    $sql = "SELECT * FROM orders "
            . "WHERE `user_id` = '{$userId}' "
            . "ORDER BY id DESC";
            
            $rs = mysql_query($sql);
            
            $smartyRs = array();
            while($row = mysql_fetch_assoc($rs)){
                $rsChildren = getPurchaseForOrder($row['id']);
                
                if($rsChildren){
                    $row['children'] = $rsChildren;
                    $smartyRs[] = $row;
                    
                }
                
            }
            
            return $smartyRs;
}

function getOrders(){
    
    $sql = "SELECT o.*, u.name, u.email, u.phone, u.adress "
            . "FROM orders AS `o` "
            . "LEFT JOIN users AS `u` ON o.user_id = u.id "
             . "ORDER BY id DESC";//id не дублируется. его у uder мы не включили->можно просто так писать
    
    
    $rs = mysql_query($sql);
    
    $smartyRs = array();
    
    while($row = mysql_fetch_assoc($rs)){
        
        $rsChildren = getProductsForOrder($row['id']);
        
        if($rsChildren){
            
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    
    return $smartyRs;
}

/**
 * 
 * получить продукты заказа
 * 
 * @param type $orderId
 */
function getProductsForOrder($orderId){
    
    
    $sql = "SELECT * "
            . "FROM purchase AS pe "
            . "LEFT JOIN products AS ps "
            . "ON pe.product_id = ps.id "
            . "WHERE (`order_id` = '{$orderId}')";
            
    $rs = mysql_query($sql);
    return CreateSmartyRsArray($rs);
    
    
}

function updateOrderStatus($itemId, $status){
    
    $status = intval($status);
    
    $sql = "UPDATE orders "
            . "SET `status` = '{$status}' "
            . "WHERE id = '{$itemId}'";
            
    $rs = mysql_query($sql);
    return $rs;
}

function updateOrderDatePayment($itemId, $datePayment){
    
    $sql = "UPDATE orders "
            . "SET `date_payment` = '{$datePayment}' "
            . "WHERE id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    return $rs;        
}