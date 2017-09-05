<?php
/* Smarty version 3.1.29, created on 2016-08-05 15:59:21
  from "C:\xampp\htdocs\myshop.local\views\admin\adminCategory.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a49bb9e07579_65493509',
  'file_dependency' => 
  array (
    'c1e56fcba653b66d4b2c461fb5899d6e93afa477' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminCategory.tpl',
      1 => 1470405396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a49bb9e07579_65493509 ($_smarty_tpl) {
?>
<h2>категория

</h2>

<table border='1' cellpadding='1' cellspacing='1'>
    
    <tr>
        
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Родительская категория</th>
        <th>Действие</th>
        
    </tr>
    
    <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categories_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_categories_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
    
        <tr>
            
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categries']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categries']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td>
                
                <input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
            </td>
            
            <td>
                
                <select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" >
                
                    <option value="0">Главная категория
                    <?php
$_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_mainItem_1_saved_item = isset($_smarty_tpl->tpl_vars['mainItem']) ? $_smarty_tpl->tpl_vars['mainItem'] : false;
$_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mainItem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
$__foreach_mainItem_1_saved_local_item = $_smarty_tpl->tpl_vars['mainItem'];
?>
                    
                    <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>
 
                    <?php
$_smarty_tpl->tpl_vars['mainItem'] = $__foreach_mainItem_1_saved_local_item;
}
if ($__foreach_mainItem_1_saved_item) {
$_smarty_tpl->tpl_vars['mainItem'] = $__foreach_mainItem_1_saved_item;
}
?>
                </select>
            </td>
            
            <td>
                
                <input type="button" value='Сохранить' onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
            </td>
        </tr>
            
    <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_categories_0_saved_local_item;
}
if ($__foreach_categories_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_categories_0_saved_item;
}
?>
</table><?php }
}
