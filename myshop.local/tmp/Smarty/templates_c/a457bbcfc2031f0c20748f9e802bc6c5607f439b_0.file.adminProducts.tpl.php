<?php
/* Smarty version 3.1.29, created on 2016-08-06 21:11:35
  from "C:\xampp\htdocs\myshop.local\views\admin\adminProducts.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a636679147a1_24730255',
  'file_dependency' => 
  array (
    'a457bbcfc2031f0c20748f9e802bc6c5607f439b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminProducts.tpl',
      1 => 1470510689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a636679147a1_24730255 ($_smarty_tpl) {
?>
<h2>Товар</h2>

<table border="1" cellpadding="1" cellspacing="1">
    
    <caption>Добавить продукт</caption>
    <tr>
        
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Сохранить</th>
    </tr>
    
    <tr>
        
        <td>
            
            <input type="edit" id="newItemName" value="" />
        </td>
        
        <td>
            
            <input type="edit" id="newItemPrice" value="" />
        </td>
        
        <td>
            
            <select id="newItemCatId">
                
                <option value="0">Главная категория
                
                <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemCat_0_saved_item = isset($_smarty_tpl->tpl_vars['itemCat']) ? $_smarty_tpl->tpl_vars['itemCat'] : false;
$_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemCat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
$__foreach_itemCat_0_saved_local_item = $_smarty_tpl->tpl_vars['itemCat'];
?>
                
                    <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

                <?php
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_0_saved_local_item;
}
if ($__foreach_itemCat_0_saved_item) {
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_0_saved_item;
}
?>
            </select>
        </td>
        
        <td>
            
            <textarea id='newItemDesc'></textarea>
        </td>
        
        <td>
            
            <input type="button" value='Сохранить' onclick='addProduct();' />
        </td>
    </tr>
</table>
            
<table border='1' cellpadding='1' cellspacing='1'>
    
    <caption>Редактировать</caption>
    
    <tr>
        
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Удалить</th>
        <th>Изображение</th>
        <th>Сохранить</th>
        
    </tr>
    
    <?php
$_from = $_smarty_tpl->tpl_vars['rsProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
        
        <tr>
            
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td>
                
                <input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
            </td>
            <td>
                
                <input type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
            </td>
            
            <td>
                
                <select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    
                    <option value="0">Главная категория
                    <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemCat_2_saved_item = isset($_smarty_tpl->tpl_vars['itemCat']) ? $_smarty_tpl->tpl_vars['itemCat'] : false;
$_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemCat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
$__foreach_itemCat_2_saved_local_item = $_smarty_tpl->tpl_vars['itemCat'];
?>
                    
                        <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['itemCat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

                    <?php
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_2_saved_local_item;
}
if ($__foreach_itemCat_2_saved_item) {
$_smarty_tpl->tpl_vars['itemCat'] = $__foreach_itemCat_2_saved_item;
}
?>
                </select>
            </td>
            
            <td>
                
                <textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                </textarea>
            </td>
            
            <td>
                
                <input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?> checked="checked" <?php }?> />
            </td>
            
            <td>
                
                <?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?><img src="/myshop.local/www/images/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width='100' /><?php }?>
                
                <form action="/myshop.local/www/admin/upload/" method="post" enctype="multipart/form-data">
                    
                    <input type="file" name="filename"><br />
                    <input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <input type="submit" value='Загрузить'><br />
                    
                </form>
            </td>
            
            <td>
                
                <input type='button' value='Сохранить' onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
            </td>
    <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_1_saved_local_item;
}
if ($__foreach_products_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_1_saved;
}
if ($__foreach_products_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_1_saved_item;
}
?>
    
    
</table><?php }
}
