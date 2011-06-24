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
    //the function of montage instance
    public function zoomin($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->zoomin($source, $dest, $option);
    }
    public function zoomout($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->zoomout($source, $dest, $option);
    }
    public function crop($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->crop($source, $dest, $option);
    }
    public function composite(Array $source, $dest, $option = array())
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->composite($source, $dest, $option);
    }
    public function watermark($source, $dest, Array $option)
    {

    }
    public function vertical_flip($source, $dest)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->vertical_flip($source, $dest);
    }
    public function horizontal_flip($source, $dest)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->horizontal_flip($source, $dest);
    }
    public function rotate($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('montage');
        $source    = $this->_getSource($source);
        return $image_obj->rotate($source, $dest, $option);
    }
    //function of utility instance
    public function getInfo($source)
    {
        $image_obj = $this->_getInstance('utility');
        return $image_obj->getInfo($source);
    }
    public function effect($source, $dest, Array $option)
    {
        $image_obj = $this->_getInstance('effect');
:w
        $source = $this->_getSource()
    }
}
 
