<?php
define("ROOT_DIR", dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
//set_include_path(get_include_path() . PATH_SEPARATOR . ROOT_DIR . 'library/');
/**
 * 自动加载
 * @param className $class
 */
function base_autoload($class)
{
    $tmp = explode('_', $class);
    if (count($tmp) > 1){
        $file = strtolower(implode(DS, $tmp)) . '.php';
    }else {
        $file = $class . '.php';
    }

    $file = ROOT_DIR . 'library/' . $file;
    if (file_exists($file))
    {
        include_once($file);
    }
}
spl_autoload_register('base_autoload');

