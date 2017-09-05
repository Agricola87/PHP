<?php
/* Smarty version 3.1.29, created on 2016-08-05 12:18:33
  from "C:\xampp\htdocs\myshop.local\views\admin\adminHeader.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a467f9669db3_43196631',
  'file_dependency' => 
  array (
    '61fa955e727a5a0b50b61fa4b8b14d409ca409cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1470392178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_57a467f9669db3_43196631 ($_smarty_tpl) {
?>
<html>
    
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" />
        <?php echo '<script'; ?>
 type='text/javascript' src="/myshop.local/www/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
    </head>
    
    <body>
        
        <div id="header">
            
            <h1>Управление сайтом</h1>
        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:adminLeftColumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <div id="centerColumn">
            
            
            
            
            <?php }
}
