<?php
/* Smarty version 3.1.29, created on 2016-07-25 13:41:58
  from "C:\xampp\htdocs\myshop.local\views\default\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5795fb06c2cae9_84325413',
  'file_dependency' => 
  array (
    'e36d542c2a768d1d8fc7927bc02ae75d63d9fe3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\product.tpl',
      1 => 1469446915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5795fb06c2cae9_84325413 ($_smarty_tpl) {
?>
<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img width="575" src="/myshop.local/www/images/product/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину">Добавить в корзину</a>
<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>class="hideme"<?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<p>Описание<br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
<?php }
}
