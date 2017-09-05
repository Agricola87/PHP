<?php
/* Smarty version 3.1.29, created on 2016-08-04 19:54:24
  from "C:\xampp\htdocs\myshop.local\views\default\user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a38150ba7a01_97953908',
  'file_dependency' => 
  array (
    '380902dee4fbea043fedd98c40c723742ffa6aea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1470333240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a38150ba7a01_97953908 ($_smarty_tpl) {
?>
<h1>Ваши регистрационные данные</h1>
<table border="0"   >
    
    <tr>
        
        <td>Логин (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    
    <tr>
        
        <td>Имя</td>
        <td><input type='text' id='newName' value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    
    <tr>
        
        <td>Телефон</td>
        <td><input type='text' id='newPhone' value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    
    <tr>
        
        <td>Адрес</td>
        <td><textarea id='newAdress'><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
    </tr>
    
    <tr>
        
        <td>Новый пароль</td>
        <td><input type='password' id='newPwd1' value=""></td>
    </tr>
    
    <tr>
        
        <td>Повтор пароля</td>
        <td><input type='password' id='newPwd2' value=""></td>
    </tr>
    
    <tr>
        
        <td>Для того, чтобы сохранить данные, ввеите текущий пароль</td>
        <td><input type='password' id='curPwd' value=""></td>
    </tr>
    
    <tr>
        
        <td>&nbsp;</td>
        <td><input type='button' value="Сохранить изменения" onClick="updateUserData();" /></td>
    </tr>
    
</table>

<h2>Заказы</h2>
    
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
    Нет заказов
<?php } else { ?>
    
    
    <table border="1" cellpadding="1" cellspacing="1">
        
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_orders_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders'] : false;
$__foreach_orders_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
$__foreach_orders_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
        
            <tr>
                
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                <td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показать товар заказа</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
            </tr>
            
            <tr class='hideme' id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" >
                
                <td colspan='7'>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                        
                        <table border='1' cellpadding='1' cellspasing='1' width='100%'>
                            
                            <tr>
                                
                                <th>№</th>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                
                            </tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_1_saved_item = isset($_smarty_tpl->tpl_vars['itemChild']) ? $_smarty_tpl->tpl_vars['itemChild'] : false;
$_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['itemChild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_1_saved_local_item = $_smarty_tpl->tpl_vars['itemChild'];
?>
                            
                                <tr>
                                    <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                    <td><a href="/myshop.local/www/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_products_1_saved_local_item;
}
if ($__foreach_products_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_1_saved;
}
if ($__foreach_products_1_saved_item) {
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_products_1_saved_item;
}
?>
                        </table>
                    <?php }?>
                    
                </td>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_local_item;
}
if ($__foreach_orders_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = $__foreach_orders_0_saved;
}
if ($__foreach_orders_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_item;
}
?>
    </table>
 <?php }?>
        <?php }
}
