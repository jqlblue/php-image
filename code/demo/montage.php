<?php
require_once('./init.php');
class demo_montage
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
        //$res = $this->zoomin_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        //$res = $this->zoomout_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        //$res = $this->crop_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        $source_file = array(
            'back' => '/home/galendy/image_test/material/big/jpg/j_b_3.jpg',
            'front'  => '/home/galendy/image_test/material/big/jpg/j_b_5.jpg'
        );

        //$res = $this->composite_test($source_file);
        //$res = $this->vertical_flip_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
        //$res = $this->horizontal_flip_test('/home/galendy/image_test/material/big/jpg/j_b_3.jpg');
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
    public function zoomout_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('width' => 2000,
                        'height' => 2000);
        return $this->_image_obj->zoomout($source_file, $dest_file, $option);
    }
    public function crop_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('width' => 1000,
                        'height' => 1000);
        return $this->_image_obj->crop($source_file, $dest_file, $option);
        
    }
    public function composite_test(Array $source_file)
    {
        $file_name = basename($source_file['front']);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        return $this->_image_obj->composite($source_file, $dest_file);        
    }
    public function vertical_flip_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        return $this->_image_obj->vertical_flip($source_file, $dest_file);        
    }
    public function horizontal_flip_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        return $this->_image_obj->horizontal_flip($source_file, $dest_file);        
    }
    public function rotate_test($source_file)
    {
        $file_name = basename($source_file);
        $dest_file = $this->_out_dir . '/' . __FUNCTION__ . '_' . $file_name;
        $option = array('degree' => 45);
        return $this->_image_obj->rotate($source_file, $dest_file, $option);  
    }
}
$__montage = new demo_montage();
