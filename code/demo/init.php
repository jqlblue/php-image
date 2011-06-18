<?php
define("ROOT_DIR", dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
//echo ROOT_DIR;exit;
set_include_path(get_include_path() . PATH_SEPARATOR . ROOT_DIR . '../framework/' . PATH_SEPARATOR . ROOT_DIR . 'application/');
/**
 * 自动加载
 * @param className $class
 */
function baccarat_autoload($class)
{
    $tmp = explode('_', $class);
    if(count($tmp) > 1) {
        $file = ROOT_DIR. 'application' . DS  . strtolower(implode(DS, $tmp)).'.php';
        if(file_exists($file)) {
            include_once($file);
        }
    }
}

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true)->pushAutoloader('baccarat_autoload');

