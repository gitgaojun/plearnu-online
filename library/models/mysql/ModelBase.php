<?php

namespace models\mysql;

/**
 * 建立基础model操作数据库 pdo 驱动
 * User: jun
 * Date: 17-3-1
 * Time: 下午11:20
 */

/**
 * Class BaseModel
 * singleton
 * 1,构造函数 连接库
 * 2,拥有query方法执行语句
 * 3,getAll 方法获取所有select 结果
 * 4,add 添加方法
 */
class ModelBase
{
    private static $link;

    public function __construct( $configArray=array() )
    {
        if ( empty($configArray) ) {
            $configArray = \Yaf\Application::app()->getConfig()->yaf;
        }
        return self::$link = self::connection($configArray['mysql_host'], $configArray['mysql_user'], $configArray['mysql_password'], $configArray['mysql_db']);
    }

    protected static function connection($host='', $user='', $password='', $db='')
    {
        if(!self::$link) {
            self::$link = new \PDO("mysql:host={$host};dbname={$db}", $user, $password);
        }

        return self::$link ;

    }

    /**
     * 1,当sql是空的时候，抛出错误说明sql语句错误。
     * 2,当查询没有结果的时候，抛出错误详情
     * 3,当成功的时候，返回结果
     * @param string $sql
     * @throws \Exception
     * @return string/object
     */
    public function query($sql='')
    {
        if($sql === '') {
            throw new \Exception('this sql is not null');
        }

        if($result = self::$link->query($sql) === false) {
            var_dump(self::$link->errorInfo());exit;
        }
        if($result===false){
            $result = array();
        }

        return $result;
    }

    protected function __clone(){ }

    protected function __sleep(){ }

    protected function __wakeup(){ }
    // 继承类都防止克隆 序列化 反序列化 ,减少对数据库对象连接的浪费

}
