<?php

define('PathPrefix','../controllers/');
define('PathPostfix','Controller.php');

//Шаблонизатор
$template = 'default';
$templateAdmin = 'admin';

//Пути к файлам шаблонов
define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', '.tpl');

//Пути к файлам шаблонов 
define('TemplateWebPath',"/myshop.local/www/templates/{$template}/");
define('TemplateAdminWebPath',"/myshop.local/www/templates/{$templateAdmin}/");

//Инициализация шаблонизатора Smarty
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
 
$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath',TemplateWebPath);
