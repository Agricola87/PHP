<?php

/**
 * 
 * @param type $id
 * @return type
 */
function getChildrenForCat($catId){
    $sql = "SELECT * FROM categories WHERE parent_id = '$catId'";
    $rs = mysql_query($sql);
    
    return CreateSmartyRsArray($rs);
    
}
/**
 * 
 * @return array массив категорий
 */
function getAllMainCatsWithChildren(){
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    
    $rs = mysql_query($sql);
    
    $smartyRs = array();
    
    while($row = mysql_fetch_assoc($rs)){
        
       $rsChildren = getChildrenForCat($row['id']);
       if($rsChildren)$row['children'] = $rsChildren;
       
       $smartyRs[] = $row;
    }
    
    return $smartyRs;
}

function getCatById($catId){
    
    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
    
}

/**
 * 
 * @return массив категорий
 */
function getAllMainCategories(){
    
    $sql = "SELECT * "
            . "FROM categories "
            . "WHERE parent_id = 0";
    
    $rs = mysql_query($sql);
    
    return CreateSmartyRsArray($rs);
}

function insertCat($catName, $catParentId = 0){
    
    $sql = "INSERT INTO "
            . "categories (`parent_id`, `name`) "
            . "VALUES ('{$catParentId}', '{$catName}')";
            
    mysql_query($sql);
    
    $id = mysql_insert_id();
    
    return $id;
            
}

function getAllCategories(){
    
    $sql = 'SELECT * '
            . 'FROM categories '
            . 'ORDER BY parent_id ASC';
    
    $rs = mysql_query($sql);
    
    return CreateSmartyRsArray($rs);
}

function updateCategoryData($itemId, $parentId = -1, $newName = ''){
    
    $set = array();
    
    if($newName){
        $set[] = "`name` = '{$newName}' ";
        
    }
    
    if($parentId > -1){
        
        $set[] = "`parent_id` = '{$parentId}' ";
    }
    
    $setStr = implode($set, ", ");
    $sql = "UPDATE categories "
            . "SET {$setStr} "
            . "WHERE id = '{$itemId}' ";
            
            $rs = mysql_query($sql);
            
            return $rs;
}