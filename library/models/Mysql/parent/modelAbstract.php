<?php

namespace App\models\Mysql\parent;

/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16-12-22
 * Time: 上午2:30
 * model Abstract
 * 模型基类
 * 用于定义操作数据库的基本属性
 */

abstract class modelAbstract
{
    protected $link;

    public function connection($params){}


}