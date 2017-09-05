<?php
/* Smarty version 3.1.29, created on 2016-07-22 12:59:21
  from "C:\xampp\htdocs\myshop.local\views\default\Category.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5791fc893ed952_87229496',
  'file_dependency' => 
  array (
    '4c42b91dbb0d0b439a33535254ed75b36cf407cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\Category.tpl',
      1 => 1469185159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5791fc893ed952_87229496 ($_smarty_tpl) {
?>
<h1>
    Товары категории
</h1>

<?php
$_from = $_smarty_tpl->tpl_vars['rsProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>

       <div style ="float: left; padding: 0 30px 40px 0;">
            
            <a href="/myshop.local/www/images/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
.jpg">
            
                <img src = "/myshop.local/www/images/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
.jpg"  width ='100' />
           </a><br />
           <a href="/myshop.local/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>           
        </div>     
           
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        
            <div style = 'clear: both;'></div>
        <?php }?>   
        
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_local_item;
}
if ($__foreach_products_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_0_saved;
}
if ($__foreach_products_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_item;
}
?>

<?php if (empty($_smarty_tpl->tpl_vars['rsProducts']->value) && empty($_smarty_tpl->tpl_vars['rsChildCats']->value)) {?>
    <h1>Категория пустая</h1>
<?php }?>

<?php
$_from = $_smarty_tpl->tpl_vars['rsChildCats']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_childCats_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_childCats_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
    <h2><a href="/myshop.local/www/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_childCats_1_saved_local_item;
}
if ($__foreach_childCats_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_childCats_1_saved_item;
}
}
}
