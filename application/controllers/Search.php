<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 17-1-28
 * Time: 下午10:10
 */

use Yaf\Controller_abstract;

class SearchController extends Controller_abstract
{


    public function getSearchAction()
    {
        $s = empty($_GET['s']) ? '' : trim($_GET['s']); // search string
        
        $this->_view->assign('getsearch.phtml');
    }

}
