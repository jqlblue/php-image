<?php
/**
 * image_im_effect 
 * @desc the effect process of image function
 * @package php-image
 * @version v1
 * @copyright 
 * @author gaoyuan <gaoyuan.blue@gmail.com> 
 * @license 
 */
class image_im_effect extends image_im_abstract
{
    private $_support_effect = array();
    public function __construct()
    {
    }
    private function _initSupportEffect()
    {
        $_support_effect['charcoal'] = array('have_degree' => true);//炭笔
        $_support_effect['colorize'] = array('have_degree' => true);//着色，可以指定三种颜色，red/green/blue
        $_support_effect['implode'] = array('have_degree' => true);//內曝效果
        $_support_effect['solarize'] = array('have_degree' => true);//曝光，模拟胶片曝光
        $_support_effect['spread'] = array('have_degree' => true);//散射,随机移动，参数是位移大小
        $_support_effect['blur'] = array('have_degree' => true); //高斯模糊
        $_support_effect['negate'] = array('have_degree' => false); //反色，形成底片的样子
        $_support_effect['monochrome'] = array('have_degree' => false); //单色，把图片变成黑白颜色
        $_support_effect['noise'] = array('have_degree' => true); //加噪音
        $_support_effect['paint'] = array('have_degree' => true); //油画效果
        $_support_effect['swirl'] = array('have_degree' => true); //扭曲图片，形成漩涡的效果
    }
    public function border($source, $dest, Array $option)
    {
        //convert -mattecolor "#000000" -frame 60x60 yourname.jpg rememberyou.png
        //convert -border 60x60 -bordercolor "#000000" yourname.jpg rememberyou.png
        //其中，"#000000"是边框的颜色，边框的大小为60x60
    }
    public function animate(Array $source, $dest, Array $option)
    {
        
    }
    //TODO support 
    public function effect($source, $dest, Array $option)
    {
        $this->_initSupportEffect();
        $convert_path = $this->_getBinPath('convert');
        $effect = $option['effect'];
        if (! isset($this->_support_effect[$effect]))
        {
            throw new Exception('unknow function');
        }
        $degree = '';
        if ($this->_support_effect[$effect]['have_degree'] == true)
        {
            $degree = $option['degree'];
        }
        $command = $convert_path . ' -' . $effect . ' ' . $degree . ' ' . $source . 
            ' ' . $dest;
        $this->_run($command);
        return $dest;
    }
}
