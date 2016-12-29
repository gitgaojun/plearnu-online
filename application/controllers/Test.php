<?php

use Yaf\Controller_Abstract;
use mongo\mongo;

class IndexController extends Controller_Abstract
{
    private $mongo; // mongo 对象

    public function __init()
    {
        $this->mongo = new mongo(MONGO_HOST, MONGO_PORT);
    }

    public function IndexAction()
    {
        $this->__init();

        // 插入数据
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
        $bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
        $bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
        $result = $this->mongo->execute('test.sites', $bulk);
        var_dump($result);exit;

        $filter = ['x' => ['$gt' => 1]];
        $options = [
            'projection' => ['_id' => 0],
            'sort' => ['x' => -1],
        ];
exit;
// 查询数据
//        $query = new MongoDB\Driver\Query($filter, $options);
//        $cursor = $this->mongo->executeQuery('test.sites', $query);
//
//        foreach ($cursor as $document) {
//            print_r($document);
//        }


        $this->_view->assign('index.html', 'hello world!');
    }
}