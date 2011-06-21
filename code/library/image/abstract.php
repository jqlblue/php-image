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
    private $_image_handle;
    private $_tmp_path = '/tmp';
    public function __construct()
    {

    }
    
    protected function _setImageHandle($handle)
    {
        //TODO check image handle exists
        //TODO should use static
        $this->_image_handle = $handle;

    }
    protected function _getImageHandle()
    {
        return $this->_image_handle;
    }
    protected function _getInstance($type)
    {
        //TODO check instance type exists
        $image_handle = $this->_getImageHandle();
        $instance     = 'image_' . $image_handle . '_' . $type;
        return $instance::getInstance();
    }
    protected function _getSource($source)
    {
        //TODO use polymorphism
        $binary_content = $this->_getFile($source);
        //TODO get uuid
        $res = file_put_contents($this->_tmp_path . '/uuid', $binary_content);
//        system("echo '" . $binary_content . "'" . " > " . $this->_tmp_path . '/uuid');
        return $this->_tmp_path . '/uuid';
        //TODO check binary content
        return "'inline:data:," . base64_encode($binary_content) . "'";
    }
    //TODO use curl later
    private function _getFile($file)
    {
        return file_get_contents($file);

        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $file);
        $contents = curl_exec($c);
        curl_close($c);
        if ($contents)
        {
            return $contents;
        }
        return false;
    }
}
