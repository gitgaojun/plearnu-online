<?php

define('APPLICATION_PATH', dirname(__FILE__));
//var_dump(new Yaf_Application('/data/www/php/yaf3/config/application.ini'));exit;
$app = new Yaf\Application(APPLICATION_PATH . '/config/application.ini');

// 配置项
$config = new Yaf\Config\Ini(APPLICATION_PATH . '/config/application.ini');
define('MONGO_HOST', $config->get('yaf.mongodb_host'));
define('MONGO_PORT', $config->get('yaf.mongodb_port'));
define('MONGO_USER', $config->get('yaf.mongodb_user'));
define('MONGO_PWD', $config->get('yaf.mongodb_pwd'));
define('MONGO_DB_NAME', $config->get('yaf.mongodb_db_name'));

$app->bootstrap()->run();