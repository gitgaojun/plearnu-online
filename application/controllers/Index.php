<?php

use Yaf\Controller_Abstract;
use mongo\mongo;

class IndexController extends Controller_Abstract
{
    private $mongo; // mongo 对象
    private $dbName; // 数据库


    public function __init()
    {
        $this->mongo = new mongo(MONGO_HOST, MONGO_PORT);
        $this->dbName = MONGO_DB_NAME;
    }

    public function IndexAction()
    {
        $this->__init();
        $filmDoc = $this->dbName . '.film';

        $filter = ['film_id'=>1];
        $options = [
            'projection' => ['_id' => 0],
            'sort' => ['x' => -1],
        ];
        $data = $this->mongo->findAll($filmDoc, $filter, $options);

        $this->getView()->assign('data', $data);
        $this->_view->assign('index.html');
    }

    public function getAllAction()
    {

    }

    /**
     * 插入基础数据，前期开发使用
     */
    public function addBaseAction()
    {
        $this->__init();
        $filmDoc = $this->dbName . '.film';

        // 插入数据
        $bulk = new MongoDB\Driver\BulkWrite;
        $data = array(
            'film_id' => 1,
            'film_title' => '肖申克的救赎',
            'show_time' => '1994-09-10',
            'film_img'=>'https://img1.doubanio.com/view/movie_poster_cover/lpst/public/p2402705389.jpg',
            'film_sort_desc' => '20世纪40年代末，小有成就的青年银行家安迪（蒂姆·罗宾斯 Tim Robbins 饰）因涉嫌杀害妻子及她的情人而锒铛入狱。在这座名为肖申克的监狱内，希望似乎虚无缥缈，终身监禁的惩罚无疑注定了安迪接下来灰暗绝望的人生。未过多久，安迪尝试接近囚犯中颇有声望的瑞德（摩根·弗里曼 Morgan Freeman 饰），请求对方帮自己搞来小锤子。',
            'add_time' => date('Y-m-d H:i:s'),
        );
        $bulk->insert($data);
        $result = $this->mongo->execute($filmDoc, $bulk);
        var_dump($result);exit;
    }

}