<?php
require_once('./init.php');
class demo_convert
{
    private $image_obj;
    public function __construct()
    {
        $this->_image_obj = new baccarat_image();
        $this->_png_image = '/data/www/php/t.leju.com/hutu/static/image/tip01.png';
        $this->_gif_image = '/data/www/php/t.leju.com/hutu/static/image/wraplayer.gif';
        $this->_jpg_image = '/data/www/php/t.leju.com/hutu/static/image/btn182x47.jpg';
        var_dump($this->_image_obj->getInfo($this->_jpg_image));exit;
    }
    public function resize_test()
    {

    }
    public function crop_test()
    {
        
    }
    public function getInfo_test()
    {

    }
    public function rotate_test()
    {

    }
    public function composite_test()
    {

    }
}
$__convert = new demo_convert();
