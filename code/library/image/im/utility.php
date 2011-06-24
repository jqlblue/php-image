<?php
/**
 * image_im_utility 
 * @desc the utility function of php image
 * can not supply from api
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
        return $res;
    }
    public function format($source, $dest, $format)
    {

    }
    /**
     * compare 
     * 
     * @return void
     */
    public function compare()
    {

    }

    //批量操作
    /**
     * batchFormat 
     * 批量转换图片格式
     * @param mixed $directory 
     * @param mixed $option 
     * @return void
     */
    public function batchFormat($directory, $option)
    {
        /**
如果想将某目录下的所有jpg文件转换为png文件，只要在命令行模式下输入:

for %f in (*.jpg) do convert "%f" "%~nf.png"
    **/
    }
    /**
     * batchThumbnail 
     * 批量生成缩略图
     * @param mixed $directory 
     * @param mixed $option 
     * @return void
     */
    public function batchThumbnail($directory, $option)
    {
        /**
譬如，批量生成某目录下所有PNG图像文件的缩略图(大小为80×40):

for %f in (*.png) do convert "%f" -sample 80×40 "%~nf_sample.png"

类似的，将某目录下所有PNG图像旋转90度的操作为：

for %f in (*.png) do convert "%f" -rotate 90 "%~nf_rotate.png"

还可以进行批量裁剪、淡化、抖动、炭化、加边框、圆角等等一系列操作，具体可参考: http://www.ibm.com/developerworks/cn/linux/l-graf/index.html
http://linux.chinaunix.net/docs/2006-12-15/3481.shtml
**/
    }
    /**
     * batchTextWatermark 
     * 批量打文字水印
     * @param mixed $directory 
     * @param mixed $option 
     * @return void
     */
    public function batchTextWatermark($directory, $option)
    {
        /**
如果你有大量图片需要发布，在所有图片上加上版权说明是很明智的做法。用ImgeMagick可以很容易的实现：

convert 1.png -fill white -pointsize 13 -draw "text 10,15 ‘lifesinger 2006＇" 2.png

可以用-font指定字体，这时需要安装Ghostscript支持: http://www.cs.wisc.edu/~ghost/

还可以用composite命令在所有图片上加上水印，有兴趣的看这里:
http://www.imagemagick.org/script/composite.php
**/
    }
    /**
     * batchImageWatermark 
     * 批量打图片水印
     * @param mixed $dectory 
     * @param mixed $option 
     * @return void
     */
    public function batchImageWatermark($dectory, $option)
    {

    }

}
