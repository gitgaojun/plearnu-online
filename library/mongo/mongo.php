<?php

namespace mongo;

use \MongoDB\Driver\Manager;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Query; //查询
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 16-12-27
 * Time: 下午10:32
 */

/**
 * Class mongoModel
 * 1,实例化对象的时候传参 host port
 */

class mongo
{

    private $host; // host 地址
    private $port; // 端口号
    private $dbUser; // user
    private $dbPwd; // pwd
    private $dbName;
    static public $link; // 链接资源

    public function __construct( $host, $port, $dbUser, $dbPwd, $dbName)
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbUser = $dbUser;
        $this->dbPwd = $dbPwd;
        $this->dbName = $dbName;
        static::$link = new Manager("mongodb://{$this->dbUser}:{$this->dbPwd}@".$this->host.":".$this->port.'/'.$this->dbName);
        return static::$link;
    }

    /**
     * 执行写入操作  写入成功返回条数，写入失败返回空
     * @param $dbName
     * @param $json
     * @return mixed|integer
     */
    public function execute($dbName, $json)
    {
        $bulk = new BulkWrite;
        $bulk->insert($json);
//        var_dump( $json);exit;
        $writeResult = static::$link->executeBulkWrite($dbName, $json);
        return $writeResult->getInsertedCount();
    }

    /**
     * 查询数据
     * @param $dbName  数据库名字
     * @param $filter  查询条件
     * @param $options  需要数据
     * @param $type string array/object  返回数据类型
     * @return mixed
     */
    public function findAll($dbName, $filter, $options, $type='array')
    {
        $query = new Query($filter, $options);
        $cursor = static::$link->executeQuery($dbName, $query);
        if('array'===$type) {
            $cursor = $cursor->toArray();
        }
        return $cursor;
    }

    /**
     * 执行查询语句
     * @param $dbName
     * @param $filter
     * @param $options
     * @return mixed
     */
    public function query($dbName, $filter, $options)
    {
        $query = new Query($filter, $options);
        $cursor = static::$link->executeQuery($dbName, $query);
        return $cursor = $cursor->toArray();
    }

}