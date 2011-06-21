<?php
/**
 * PHP versions 5
 *
 * @category image
 * @package  image
 * @author   gaoyuan <gaoyuan.blue@gmail.com>
 * @version  SVN: $Id: image.php 162731 2011-04-28 12:30:44Z gaoyuan $
 */
class image extends image_abstract
{
    public function __construct()
    {
        $this->_setImageHandle('im');
    }
    public function zoomin($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->zoomin($source, $dest, $option);
    }
    public function getInfo($source)
    {
        $image_obj = $this->_getInstance('utility');
        return $image_obj->getInfo($source);
        
    }
}
 
