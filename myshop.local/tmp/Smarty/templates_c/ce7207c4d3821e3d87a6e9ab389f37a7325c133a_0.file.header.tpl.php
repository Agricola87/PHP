<?php
/* Smarty version 3.1.29, created on 2016-07-25 11:12:18
  from "C:\xampp\htdocs\myshop.local\views\default\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5795d7f29af352_71457540',
  'file_dependency' => 
  array (
    'ce7207c4d3821e3d87a6e9ab389f37a7325c133a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\header.tpl',
      1 => 1469436936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5795d7f29af352_71457540 ($_smarty_tpl) {
?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
        <?php echo '<script'; ?>
 type="text/javascript" src="/myshop.local/www/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/myshop.local/www/js/main.js"><?php echo '</script'; ?>
>
    </head>
    
    <body>
        <div id="header">
            <h1>
                Myshop - интернет-магазин
            </h1>
        </div>
        
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <div id="centerColumn">
            <?php }
}
