<?php

function getLastProducts($limit = null){
    
    $sql = "SELECT * FROM products ORDER BY id DESC";
    
    if($limit){ $sql.=" LIMIT {$limit}";}
    
    $rs = mysql_query($sql);
    
    return CreateSmartyRsArray($rs);
        
}

function getProductsByCat($itemId){
    
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

function getProductById($itemId){
    
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE id= '{$itemId}'";
    
    $rs = mysql_query($sql);
    //d(mysql_fetch_assoc($rs)['image']);
    $ret=mysql_fetch_assoc($rs);
    
    $ret['image'] =  preg_replace("|.png|i", '.jpg', $ret['image']);
    
    return $ret;
    
}

function getProductsFromArray($itemsIds){
    
    
    $strIds = implode($itemsIds,', ');
    $sql = "SELECT * FROM products WHERE id in ({$strIds})";
    $rs = mysql_query($sql);
    //echo $sql;exit;
    return CreateSmartyRsArray($rs);

}

function getProducts(){
    
    $sql = "SELECT * "
            . "FROM `products` "
            . "ORDER BY category_id";
    
    $rs = mysql_query($sql);
    
    return CreateSmartyRsArray($rs);
}

function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat){
    
    $sql = "INSERT INTO products "
            . "SET "
            . "`name` = '{$itemName}', "
            . "`price` = '{$itemPrice}', "
            . "`description` = '{$itemDesc}', "
            . "`category_id` = '{$itemCat}' ";
            
    $rs = mysql_query($sql);
    
    return $rs;
}

function updateProduct($itemId, $itemName, $itemPrice, 
        $itemStatus, $itemDesc, $itemCat, $newFileName = null){
    
    $set = array();
    
    if($itemName){
        
        $set[] = " `name` = '{$itemName}' ";
    }
    
    if($itemPrice > 0){
        
        $set[] = " `price` = '{$itemPrice}' ";
    }
    
    if($itemStatus !== null){
        
        $set[] = " `status` = '{$itemStatus}' ";
    }
    
    if($itemDesc){
        
        $set[] = " `description` = '{$itemDesc}' ";
    }
    
    if($itemCat){
        
        $set[] = " `category_id` = '{$itemCat}' ";
    }
    
    if($newFileName){
        
        $set[] = " `image` = '{$newFileName}' ";
    }
    
    $setStr = implode($set, ", ");
    $sql = "UPDATE products "
            . "SET {$setStr} "
            . "WHERE id = '{$itemId}' ";
            
    $rs = mysql_query($sql);
    
    return $rs;
}

function updateProductImage($itemId, $newFileName){
    
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);
    
    return $rs;
}