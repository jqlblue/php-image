<?php
require_once('./init.php');
class demo_effect
{
    private $_image_obj;
    private $_out_dir = '/xr/git/php/php-image/image_tests/our_dir';
    public function __construct()
    {
        $this->_image_obj = new image();
        if (! is_dir($this->_out_dir))
        {
            system('mkdir -p ' . $this->_out_dir);
        }
        $res = $this->rotate_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');      
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
    
}
$__effect = new demo_effect();