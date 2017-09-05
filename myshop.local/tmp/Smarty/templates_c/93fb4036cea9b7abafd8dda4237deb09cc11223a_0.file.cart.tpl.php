<?php
/* Smarty version 3.1.29, created on 2016-07-29 14:12:26
  from "C:\xampp\htdocs\myshop.local\views\default\cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579b482a834f00_37344612',
  'file_dependency' => 
  array (
    '93fb4036cea9b7abafd8dda4237deb09cc11223a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\cart.tpl',
      1 => 1469794010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579b482a834f00_37344612 ($_smarty_tpl) {
?>
<h1>
    Корзина
</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    
    В корзине пусто.
    
    <?php } else { ?>
        <form action="/myshop.local/www/cart/order/" method="POST" >
            
            
        
        <h2>Данные заказа</h2>
        <table>
            <tr>
                <td>
                    №
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Действие
                </td>
            </tr>
            
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
                
                <tr>
                    <td>
                        <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

                    </td>
                    
                    <td>
                        <a href="/myshop.local/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
                    </td>
                    
                    <td>
                        <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
                    </td>
                    
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value ="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>      
                    </td>
                        
                    <td>
                        <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value ="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    
                    <td>
                        <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить из корзины">Удалить</a>
                        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Восстановить элемент">Восстановить элемент</a>
                    </td>
                    
                </tr>
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
        </table>
        
        <input type="submit" value="Оформить заказ" />
        </form>
<?php }
}
}
