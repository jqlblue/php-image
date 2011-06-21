<?php
/**
 * image_im_montage
 * @desc the modify function of image php
 * @package php-image
 * @version v1
 * @copyright 
 * @author gaoyuan <gaoyuan.blue@gmail.com> 
 * @license 
 */
class image_im_montage extends image_im_abstract
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * zoomin 
     * 缩小
     * @param mixed $source 
     * @param mixed $dest 
     * @param Array $option 
     * @return string $dest
     */
    public function zoomin($source, $dest, Array $option)
    {
        $convert_path = $this->_getBinPath('convert');
        //TODO check option
        $width        = empty($option['width']) ? '' : $option['width'];
        $height       = empty($option['height']) ? '' : $option['height'];
        if ($width && $height) {
            $extra_command = '-resize ' . $width . 'x' . $height . '\!\>';
        } else {
            $extra_command = '-resize ' . $width . 'x' . $height . '\>';
        }
        $command = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    /**
     * zoomout 
     * 放大
     * @param mixed $source 
     * @param mixed $dest 
     * @param Array $option 
     * @return string $dest
     */
    public function zoomout($source, $dest, Array $option)
    {
        $convert_path = $this->_getBinPath('convert');
        //TODO check option
        $width        = empty($option['width']) ? '' : $option['width'];
        $height       = empty($option['height']) ? '' : $option['height'];
        if ($width && $height) {
            $extra_command = '-resize ' . $width . 'x' . $height . '\!\<';
        } else {
            $extra_command = '-resize ' . $width . 'x' . $height . '\<';
        }
        $command = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    /**
     * crop 
     * 裁剪图片
     * @param mixed $source 
     * @param mixed $dest 
     * @param Array $option 
     * @return string $dest
     */
    public function crop($source, $dest, Array $option)
    {
        $convert_path  = $this->_getBinPath('convert');
        //TODO check option
        $width         = $option['width'];
        $height        = $option['height'];
        $coordinate_x  = $option['x'];
        $coordinate_y  = $option['y'];
        $extra_command = '-crop ' . $width . 'x' . $height . '+' . $coordinate_x . '+' . $coordinate_y;
        $command       = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    /**
     * composite 
     * 合成图片
     * @param Array $source 
     * @param mixed $dest 
     * @param array $option 
     * @return string $dest
     */
    public function composite(Array $source, $dest, $option = array())
    {
        $composite_path = $this->_getBinPath('composite');
        $front          = $source['front'];
        $back           = $source['back'];
        $extra_command  = '';
        if (empty($option)) {
            $extra_command = '-gravity center';
        } else {
            $compose       = $option['compose'];
            $coordinate_x  = $option['x'];
            $coordinate_y  = $option['y'];
            $extra_command = '-compose ' . $compose . ' -geometry ' . '+' . 
                $coordinate_x . '+' . $coordinate_y;
        }
        $command = $composite_path . ' ' . $extra_command . ' ' . $front . 
            . ' ' . $back . ' ' . $dest;
        $this->_run($command);
        return $dest;
    }
    public function watermark($source, $dest, Array $option)
    {

    }
    /**
     * vertival_flip 
     * 水平翻转 
     * @param mixed $source 
     * @param mixed $dest 
     * @return string $dest
     */
    public function vertival_flip($source, $dest)
    {
        $convert_path  = $this->_getBinPath('convert');
        //TODO check option
        $extra_command = '-flip';
        $command       = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    /**
     * horizontal_flip 
     * 垂直翻转
     * @param mixed $source 
     * @param mixed $dest 
     * @return string $dest
     */
    public function horizontal_flip($source, $dest)
    {
        $convert_path  = $this->_getBinPath('convert');
        //TODO check option
        $extra_command = '-flop';
        $command       = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    /**
     * rotate 
     * 旋转图片
     * @param mixed $source 
     * @param mixed $dest 
     * @param Array $option 
     * @return string $dest
     */
    public function rotate($source, $dest, Array $option)
    {
        $convert_path  = $this->_getBinPath('convert');
        //TODO check option
        $degree = $option['degree'];
        $extra_command = '-rotate ' . $degree;
        $command       = $convert_path . ' ' . $source . ' ' . $extra_command . ' ' . $dest;
        $this->_run($command);
        //TODO check 
        return $dest;
    }
    public function noise($source, $dest, Array $option)
    {

    }
}
