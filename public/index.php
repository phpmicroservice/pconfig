<?php

use Phalcon\Loader;

#  constant
define('PUBLIC_ROOT', __DIR__);
define('WWW_ROOT', dirname(__DIR__));
define('MYSQL_DATA_F', 'Y-m-d H:i:s');

# 加载第三方包
include WWW_ROOT . '/vendor/autoload.php';
# 处理其他

$dotenv = \Dotenv\Dotenv::create(WWW_ROOT);
$dotenv->load();
$dotenv->required('DATABASE_TYPE')->allowedValues([
    'mysql', 'PostgreSQL', 'Sqlite', 'MongoDB'
]);

# 
define('APP_DEBUG', (bool)getenv('APP_DEBUG'));
if(APP_DEBUG){
    error_reporting(E_ALL);
ini_set('display_errors', '0');
}
# autoload
$loader = new Loader();
$loader->registerNamespaces(
        [
            'app' => WWW_ROOT.'/app/',
            'pconfig' => WWW_ROOT.'/pconfig/',
            'db' => WWW_ROOT.'/db/'
        ]
);
$loader->register();

try {
    $application = new \app\Application();
    $application->start();
} catch (\Exception $e) {
    echo $e->getMessage();
    echo '<br>';
    echo $e->getTraceAsString();
   
   
}
