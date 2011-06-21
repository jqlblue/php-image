<?php
require_once('./init.php');
class demo_convert
{
    private $_image_obj;
    private $_out_dir = '/xr/git/php/php-image/image_test/our_dir';
    public function __construct()
    {
        $this->_image_obj = new image();
        if (! is_dir($this->_out_dir))
        {
            system('mkdir -p ' . $this->_out_dir);
        }
        //$res = $this->zoomin_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        $res = $this->getInfo_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        var_dump($res);
    }
    public function zoomin_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('width' => 100,
                        'height' => 100);
        return $this->_image_obj->zoomin($source_file, $dest_file, $option);
    }
    public function zoomout_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('width' => 100,
                        'height' => 100);
        return $this->_image_obj->zoomout($source_file, $dest_file, $option);
    }
    public function crop_test()
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('width' => 100,
                        'height' => 100);
        return $this->_image_obj->crop($source_file, $dest_file, $option);
        
    }
    public function getInfo_test($source_file)
    {
        return $this->_image_obj->getInfo($source_file);
    }
    public function rotate_test()
    {

    }
    public function composite_test()
    {

    }
}
$__convert = new demo_convert();
