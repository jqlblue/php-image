<?php
/**
 * image_im_utility 
 * @desc the utility function of php image
 * @package php-image
 * @version v1
 * @copyright 
 * @author gaoyuan <gaoyuan.blue@gmail.com> 
 * @license 
 */
class image_im_utility extends image_im_abstract
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * getInfo 
     * TODO check if use http://www.imagemagick.org/script/escape.php,like "identify -format '%k' tree.gif"
     * @return void
     */
    public function getInfo($source) 
    {
        $identify_path = $this->_getBinPath('identify');
        $extra_command = "-format '%b|%C|%f|%i|%h|%w'";
        $command = $identify_path . ' ' . $extra_command . ' ' . $source;
        $res = $this->_run($command);
        var_dump($res);
    }
    public function format($source, $dest, $format)
    {

    }

}
