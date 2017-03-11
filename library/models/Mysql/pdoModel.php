<?php

namespace App\models\Mysql\pdoModel;

use App\Models\Mysql\parent\modelAbstract;

/**
 * Class mysqlModel
 * 一个数据模型需要满足几个要求：
 * 1，只能实例化一个对象
 * 2，查询数据的方法
 * 3，添加数据的方法
 * 4，修改数据的方法
 * 5，制定表和数据的方式通过 指定表名和数据参数的形式完成数据过滤
 * 6，建造过滤 方法 filter 过滤参数 防止sql 注入
 * @author jun <1148743058@qq.com>
 */

class pdoModel extends modelAbstract
{

    private $link;   // 数据库连接资源
    private $host;   // 数据库连接 地址
    private $port;   // 数据库连接 端口
    private $userName;   // 数据库 用户名
    private $password;     // 数据库 密码
    private $dbName;       // 数据库 名字
    private $tbName;       // 查询 主表名
    private $select = array(); // 需要查询的数据

    public function connection($host, $port, $userName, $password, $dbName)
    {
        $this->link =  new \PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->userName, $this->password);
    }

    /**
     * 创建接口方法
     * @return pdoModel
     */
    public function getInstance()
    {
        if( $this->link === null ) {
            $this->link = new self($this->host, $this->port, $this->userName, $this->password, $this->dbName);
        }
        return $this->link;
    }

    /**
     * 指定查询表
     * @param $tbName
     * @return $this
     */
    public function queryBundle($tbName)
    {
        $this->tbName = $this->filter($tbName);
        return $this;
    }

    /**
     * 指定查询结果参数
     * @param array $select
     * @return pdoModel
     */
    public function select(Array $select )
    {
        $this->select = $this->filter($select);
        return $this;
    }

    /**
     * 1，判断数据类型 string or array
     * 2，去掉特殊字符 单引号 斜线 html 实体标签
     * @param $params
     * @param $params
     * @return array|mixed
     * @throws \Exception
     */
    private function filter($params)
    {
        if ( is_string( $params ) ) {
            $params = preg_replace('/[<>\/\']/i', '', $params);
        } elseif ( is_array( $params ) ) {
            $paramsNew = array();
            foreach($params as $k=>$v) {
                if(is_array($v)) {
                    throw new \Exception('参数错误，不是一维数组');
                }
                $k = preg_replace('/[<>\/\']/i', '', $k);
                $v = preg_replace('/[<>\/\']/i', '', $v);
                $paramsNew[$k] = $v;
            }
            $params = $paramsNew;
        }
        return $params;
    }

}