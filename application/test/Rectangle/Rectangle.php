<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 17-2-14
 * Time: 下午11:41
 */

class Rectangle
{
    public $width;
    public $height;

    public function __construct($width=0, $height=0)
    {
        $this->width    = $width;
        $this->height   = $height;
    }

    public function getPerimeter()
    {
        return ($this->width + $this->height) * 2;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }

    final public function __clone()
    {
        return false;
    }

}

final class Square extends Rectangle
{

    public function __construct($width=0)
    {
        $this->width     = $width;
        $this->height    = $width;
    }

}
// 正方形继承矩形,只是在最初的时候需要重写构造函数,继承其他方法

