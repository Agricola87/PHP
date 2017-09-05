<?php
/* Smarty version 3.1.29, created on 2016-08-05 14:43:07
  from "C:\xampp\htdocs\myshop.local\views\admin\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a489dbb8bb08_63028115',
  'file_dependency' => 
  array (
    'c9fe0ef83a480635aaa8edb1f87486ca16e36c9f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1470400960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a489dbb8bb08_63028115 ($_smarty_tpl) {
?>
<div id="blockNewCategory">
    
    Новая категория:
    <input name="newCategoryName" id="newCategoryName" type="text" value="" />
    <br />  
    
    Явлется подкатегорией для
    <select name="generalCatId">
        
        <option value="0">Главная категория
        <?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
        
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
    </select>
    <br />
    
    <input type='button' onclick="newCategory();" value="Добавить категорию" />
</div><?php }
}
