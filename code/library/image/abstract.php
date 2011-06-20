<?php
/**
 * PHP versions 5
 *
 * @category image
 * @package  image
 * @author   gaoyuan <gaoyuan.blue@gmail.com>
 * @version  SVN: $Id: image.php 162731 2011-04-28 12:30:44Z gaoyuan $
 */
abstract class image_abstract
{
    private $_image_format = array(
        'JPEG' => 'jpg',
        'PNG'  => 'png',
        'GIF'  => 'gif',

    );
    private $function_type = array('create', 'montage', 'effect');
    public function __construct()
    {
    }
    final public static function getInstance()
    {
        static $instance_pool = array();
        $class_name = get_called_class();
        if (! isset($instance_pool[$class_name]))
        {
            $instance_pool[$class_name] = new $class_name();
        }
        return $instance_pool[$class_name];
    }
    protected function _getPath($return)
    {
        $start  = strpos($return, "Image:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 6, $length-5);
        return trim($result);
    }

    protected function _getFormat($return)
    {
        $start  = strpos($return, "Format:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 7, $length-6);
        $result = explode('(', $result);
        $format = trim($result[0]);
        return $this->_image_format[$format];
    }

    protected function _getSize($return)
    {
        $start  = strpos($return, "Geometry:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 10, $length-9);
        $result = explode('+', $result);
        return $result[0];
    }

    protected function _getGeometry($return)
    {
        $start  = strpos($return, "Geometry:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 10, $length-9);
        return trim($result);
    }

    protected function _getDepth($return)
    {
        $start  = strpos($return, "Depth:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 7, $length-6);
        return trim($result);
    }
    protected function _getClass($return)
    {
        $start  = strpos($return, "Class:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 7, $length-6);
        return trim($result);
    }
    protected function _getFilesize($return)
    {
        $start  = strpos($return, "Filesize:"); 
        $result = substr($return, $start); 
        $length = strpos($result, "\n"); 
        $result = substr($result, 10, $length-9);
        return trim($result);
    }
}
