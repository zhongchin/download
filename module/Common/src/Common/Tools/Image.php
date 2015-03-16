<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15-3-14
 * Time: 下午7:26
 */

namespace Common\Tools;


class Image
{
    private $image;
    private $info;

    public function __construct($path)
    {
        $info = getimagesize($path);
        $this->info = array(
            'width' => $info[0],
            'height' => $info[1],
            'type' => image_type_to_extension($info[2], false),
            'mime' => $info['mime']);
        $fun = "imagecreatefrom{$this->info['type']}";
        $this->image = $fun($path);
    }

    public function thumb($width, $height)
    {
        $image_thumb = imagecreatetruecolor($width, $height);
        imagecopyresampled($image_thumb, $this->image, 0, 0, 0, 0, $width, $height, $this->info['width'], $this->info['height']);
        imagedestroy($this->image);
        $this->image = $image_thumb;
    }

    /*
     *          添加图片水印
     *
     */
    public function imageMark($source, $local, $alpha)
    {
        $info = getimagesize($source);
        $type = image_type_to_extension($info[2], false);
        $func = "imagecreatefrom{$type}";
        $water = $func($source);
        imagecopymerge($this->image, $water, $local['x'], $local['y'], 0, 0, $info[0], $info[1], 30);
    }

    /*
     *  操作图片（添加文字水印）
     */
    public function fontMark($content, $font_url, $size, $color, $local, $angle)
    {
        $col = imagecolorallocatealpha($this->image, $color[0], $color[1], $color[2], $color[3]);
        imagettftext($this->image, $size, $angle, $local['x'], $local['y'], $col, $font_url, $content);
    }

    /*
    *                    在浏览器中输出图片
    *
    */
    public function show()
    {
        header("Content-type:" . $this->info['mime']);
        $func = "image{$this->info['type']}";
        $func($this->image);
    }

    /*
     *   把图片保存到硬盘中     *      * */

    public function save($newname)
    {
        $func = "image{$this->info['type']}";
        $func($this->image, $newname . "." . $this->info['type']);
    }

    public function __destruct()
    {
        imagedestroy($this->image);
    }


}