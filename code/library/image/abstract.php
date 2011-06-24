<?
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
        if (is_array($source)) {
            foreach ($source as $key => &$val)
            {
                $binary_content = $this->_getFile($val);
                file_put_contents($this->_tmp_path . '/uuid_' . $key, $binary_content);
                $val = $this->_tmp_path . '/uuid_' . $key;
            }
            return $source;
        } else {
            $binary_content = $this->_getFile($source);
            //TODO get uuid
            $res = file_put_contents($this->_tmp_path . '/uuid', $binary_content);
            return $this->_tmp_path . '/uuid';
        }
    }
    //TODO use curl later
    private function _getFile($file)
    {
        return file_get_contents($file);
    }
}
