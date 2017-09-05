<?php
/* Smarty version 3.1.29, created on 2016-08-02 14:08:12
  from "C:\xampp\htdocs\myshop.local\views\default\order.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a08d2c884f65_87650828',
  'file_dependency' => 
  array (
    'ec9040102796f40493e3fd556a04b6936f09856d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\order.tpl',
      1 => 1470139684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a08d2c884f65_87650828 ($_smarty_tpl) {
?>
<h2>Данные заказа</h2>

<form id="frmOrder"  action="/myshop.local/www/cart/saveorder/" method="POST">
    
    <table>
        
        <tr>
            
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
            
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
                
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                <td><a href="/myshop.local/www/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
                <td>
                    <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                    </span>
                </td>
                
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                    </span>
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
    
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'buttonClass', 0);?>
        <h2>Данные заказчика</h2>
        <div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>
            <?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'phone', 0);?>
            <?php $_smarty_tpl->tpl_vars['adress'] = new Smarty_Variable($_smarty_tpl->tpl_vars['arUser']->value['adress'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'adress', 0);?>
            
            <table>
                
                <tr>
                    <td>Имя*</td>
                    <td><input type='text' id='name' name='name' value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></td>
                </tr>
                
                <tr>
                    <td>Телефон*</td>
                    <td><input type='text' id='phone' name='phone' value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" /></td>
                </tr>
                
                <tr>
                    <td>Адрес*</td>
                    <td><textarea type='text' id='adress' name='adress' ><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea></td>
                </tr>
            </table>
            
            
        </div>
            
    <?php } else { ?>
        
        <div id="loginBox">
            
            <div class="menuCaption">Авторизация</div>
            <table>
                
                <tr>
                    <td>Логин</td>
                    <td><input type='text' id='loginEmail' name='loginEmail' value="" /></td>
                </tr>
                
                <tr>
                    <td>Пароль</td>
                    <td><input type='password' id='loginPwd' name='loginPwd' value="" /></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type='button' onclick="login();" value="Войти" /></td>
                </tr>
            </table>
            
            
        </div>
        
        <div id='registerBox'>или <br />
            <div class="menuCaption">Регистрация нового пользователя</div>
            email* :<br />
            <input type='text' id='email' name='email' value='' /><br />
            пароль* :<br />
            <input type='password' id='pwd1' name='pwd1' value='' /><br />
            повторить пароль* :<br />
            <input type='password' id='pwd2' name='pwd2' value='' /><br />
            
            Имя* :<input type='text' id='name' name='name' value='' /><br />
            Телефон* :<input type='text' id='phone' name='phone' value='' /><br />
            Адрес* :<textarea id='adress' name='adress' >   </textarea><br />
            
            <input type='button' onclick='registerNewUser();' value="Зарегистрироваться" />
        </div>
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_Variable("class= 'hideme'", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'buttonClass', 0);?>
     <?php }?>
     
     <input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();" />
</form>
    <?php }
}
