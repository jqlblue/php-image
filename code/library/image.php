<?php
/**
 * PHP versions 5
 *
 * @category image
 * @package  baccarat
 * @author   gaoyuan <gaoyuan@leju.sina.com.cn>
 * @version  SVN: $Id: image.php 162731 2011-04-28 12:30:44Z gaoyuan $
 */
class baccarat_image extends baccarat_image_abstract
{
    private $_convert_path = '/usr/bin/convert ';
    private $_identify_path = '/usr/bin/identify ';
    public function __construct()
    {
    }
    private function _run($command)
    {
        //TODO get command
        $command = escapeshellcmd($command);
        exec($command, $out, $return);
        //TODO check out type,format when is array
        if (is_array($out)){
            $out = ("\n<pre>\n".join("\n", $out)."\n</pre>\n"); 
        }
        return array('out' => $out, 'return' => $return);
        //TODO check,and return
    }
    /**
     * 等比缩放图片
     * Enter description here ...
     * @param unknown_type $file
     * @param array $option
     */
    public function resize($file, $dest_file, Array $option)
    {
        //TODO get command
        $width = '';
        if (isset($option['with']))
        {
            $width = abs(intval($option['width']));
        }
        $height = '';
        if (isset($option['height']))
        {
            $height = abs(intval($option['height']));
        }
        if ($width == '' && $height == '')
        {
            throw new Exception('paramater error');
        }
        $command = $this->_convert_path . ' -resize ' . $width . 'x' .
             $height . $file . ' ' . $dest_file;
        $this->_run($command);
        return $dest_file;
    }
    /**
     * crop裁剪图片
     * 
     * @param mixed $file 
     * @param mixed $dest_file 
     * @param Array $option 
     * @return void
     */
    public function crop($file, $dest_file, Array $option)
    {
        //TODO get command
        //width > height ,crop width/2
        //width < height ,crop height
        $coordinate_x = abs(intval($option['x']));
        $coordinate_y = abs(intval($option['y']));
        $dest_width   = abs(intval($option['width']));
        $dest_height  = abs(intval($option['height']));
        if ($coordinate_x >= $dest_width)
        {
            throw new Exception('paramater error');
        }
        if ($coordinate_y >= $dest_height)
        {
            throw new Exception('paramater error');
        }
        $command = $this->_convert_path . ' -crop ' . $dest_width . 'x' . $dest_height . '+' .
            $coordinate_x . '+' . $coordinate_y .' ' . $file . ' ' . $dest_file;
        $this->_run($command);
        return $dest_file;
    }
    public function getInfo($file)
    {
        $command = $this->_identify_path . ' -verbose ' . $file;
        //echo $command;
        $res = $this->_run($command);
        //echo "<pre>";
        //var_dump($res);exit;
        if (! $this->_checkRes($res))
        {
            //TODO return debug info,and return
        }

        $info = array();
        $info['path'] = $this->_getPath($res['out']);
        //echo "<br/>path = " . $path . "<br/>";
        $info['format'] = $this->_getFormat($res['out']);
        //echo "<br/>format = " . $format . "<br/>";
        $info['size'] = $this->_getSize($res['out']);
        //echo "<br/>size = " . $size . "<br/>";
        $info['geometry'] = $this->_getGeometry($res['out']);
        //echo "<br/>geometry = " . $geometry . "<br/>";
        $info['depth'] = $this->_getDepth($res['out']);
        //echo "<br/>depth = " . $depth . "<br/>";
        $info['class'] = $this->_getClass($res['out']);
        //echo "<br/>class = " . $class . "<br/>";
        $info['file_size'] = $this->_getFilesize($res['out']);
        //echo "<br/>file_size = " . $file_size . "<br/>";
        /**
        $out = $res['out'][0];
        $out_array = explode(' ', $out);
        array_pop($out_array);
        array_pop($out_array);
        echo "<pre>";
        var_dump($out_array);exit;
        $out_key   = array('path', 'format', 'size', 'geometry' , 'depth',
            'class', 'filesize');
        $out_info = array();
        foreach ($out_key as $key)
        {
 //           $__process_function = '_get' . ucfirst($key) . '(' . ')';
 //           $out_info[$key] = ucfirst()
        }
        $out_info = array_combine($out_key, $out_array);
        $__size_string = $out_info['size'];
        
        $__geometry_string = $out_info['geometry'];
        //TODO check res
        var_dump($out_info);
        //TODO return array
        **/
        return $info;
    }
    private function _checkRes(Array $res)
    {
        if (! isset($res['return']))
        {
            return false;
        }
        if ($res['return'] != 0)
        {
            return false;
        }
        if (! isset($res['out'][0]))
        {
            return false;
        }
        return true;
        //TODO output debug info and whole command,when checked false;
    }
    //旋转图片
    public function rotate()
    {

    }
    //TODO 批量处理图片，使用mogrify

    //合成图片
    public function composite() 
    {

    }
    //加水印
    //http://www.imagemagick.org/Usage/annotating/#overlay
    public function watermarkSymbols()
    {

    }
    //文字水印
    public function watermarkText()
    {

    }
    //图片水印
    public function watermarkImage()
    {

    }
    //http://www.imagemagick.org/Usage/layers/#composite
    public function append()
    {

    }
    //创建gi
    //分解gif

    //转换格式
    public function format()
    {

    }
    //加边框
    //普通，凸边
    public function border()
    {

    }
    //添加效果
    //模糊,反色，单色，油画，炭笔，散射（毛玻璃），漩涡
    public function addEffects()
    {

    }
    //加噪声
    public function addNoise()
    {

    }
    //将文字生成图片
    //http://www.imagemagick.org/Usage/text/
    public function textToImage()
    {

    }
    //图片处理
    //http://www.imagemagick.org/Usage/photos/
    public function photoProcess()
    {

    }
    //http://www.imagemagick.org/Usage/lens/
    public function lens()
    {

    }




}
