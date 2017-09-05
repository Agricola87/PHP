<?php
/**
 * Модель для таблицы продкции
 * 
 * Внечсение в БД данных пролукта с привязкой к заказу
 * 
 * 
 * 
 * @param integer $orderId
 * @param array $cart массив корзины
 */
function setPurchaseForOrder($orderId, $cart){
    
    $sql = "INSERT INTO purchase "
            . "(order_id, product_id, price, amount) "
            . "VALUES ";
    
    $values = array();
    
    foreach($cart as $item){
        $values[] = " ('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}') ";
    }
    
    $sql .= implode($values, ', ');
    
//        touch("test.txt");
//    $fd = fopen("test.txt", "r+");
//    fwrite($fd, print_r($sql, true));  
    
    
    $rs = mysql_query($sql);
    
    return $rs;
}


function getPurchaseForOrder($orderId){
    
    $sql = "SELECT `pe`.*, `ps`.`name` "
            . "FROM purchase as `pe` "
            . "JOIN products as `ps` ON `pe`.product_id = `ps`.id "
            . "WHERE `pe`.order_id = {$orderId}";
    
    $rs = mysql_query($sql);
    return CreateSmartyRsArray($rs);
    
}