<?php
/**
 * image_utility 
 * @desc the utility function of php image
 * @package php-image
 * @version v1
 * @copyright 
 * @author gaoyuan <gaoyuan.blue@gmail.com> 
 * @license 
 */
class image_utility extends image_abstract
{
    public function __construct()
    {
        echo 'i am utility function';
    }
    /**
     * getInfo 
     * TODO check if use http://www.imagemagick.org/script/escape.php,like "identify -format '%k' tree.gif"
     * @return void
     */
    public function getInfo() 
    {

    }
}
