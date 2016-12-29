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
    static public $link; // 链接资源

    public function __construct( $host, $port )
    {
        $this->host = $host;
        $this->port = $port;
        static::$link = new Manager("mongodb://".$this->host.":".$this->port);
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

}