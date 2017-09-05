<?php
/* Smarty version 3.1.29, created on 2016-08-03 08:44:51
  from "C:\xampp\htdocs\myshop.local\views\default\leftcolumn.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a192e3d2e011_28451529',
  'file_dependency' => 
  array (
    '729145b4f4f2e6a7b3f096fbd4fa779733b42ec2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1470206690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a192e3d2e011_28451529 ($_smarty_tpl) {
?>
 
        
        <div id="leftColumn">
            
            <div id="leftMenu">
                <div class="menuCaption">Меню:</div>
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
                    <a href="/myshop.local/www/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
                    
                    <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                        
                        <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemChild_1_saved_item = isset($_smarty_tpl->tpl_vars['itemChild']) ? $_smarty_tpl->tpl_vars['itemChild'] : false;
$_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemChild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
$__foreach_itemChild_1_saved_local_item = $_smarty_tpl->tpl_vars['itemChild'];
?>
                        
                            --<a href="/myshop.local/www/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br />
                        <?php
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_itemChild_1_saved_local_item;
}
if ($__foreach_itemChild_1_saved_item) {
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_itemChild_1_saved_item;
}
?>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
            </div>
            
            <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
            
                <div id="userBox">
                    
                    <a href="/myshop.local/www/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
                    <a href="/myshop.local/www/user/logout/" onClick="logout();">Выход</a><br />
                    
                </div>
            <?php } else { ?>
            
            <div id="userBox" class="hideMe">
                
                <a href="#" id="userLink" ></a><br />
                <a href="/myshop.local/www/user/logout/" onClick="logout();">Выход</a>
            </div>
            
            <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
                <div id="loginBox">

                    <div class="menuCaption">Авторизация</div>
                    <input type="text" id="loginEmail" name="loginEmail" value="" />
                    <input type="password" id="loginPwd" name="loginPwd" value="" />
                    <input type="button" onClick="login();" value="Войти" />
                </div>

                <div id="registerBox">

                    <div class="menuCaption showHidden" onClick="showRegisterBox();">Регистрация</div>
                    <div id="registerBoxHidden">

                        email:<br>
                        <input type="text" id="email"  name="email" value="" /><br />
                        пароль: <br />
                        <input type="password" id="pwd1" name="pwd1" value="" /><br />
                        повторить пароль: <br/>
                        <input type="password" id="pwd2" name="pwd2" value="" /><br />
                        <input type="button" onClick="registerNewUser()" value="Зарегистрироваться" />
                    </div>
                </div>
            <?php }?>
            <?php }?>
            
            
            <div class="menuCaption">Корзина</div>
            <a href ="/myshop.local/www/cart/" title ="Перейти в корзину">В корзине</a>
            <span id="cartCntItems">
                <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
        </span>
        </div><?php }
}
