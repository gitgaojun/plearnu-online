<?php

use Yaf\Controller_Abstract;
use mongo\mongo;
use models\mysql\ModelUser;

class UserController extends Controller_Abstract
{

    protected $result = array('status' => false, 'message' => '', 'code' => 400000, 'data'=>[]);

    public function __init()
    {

    }

    /**
     * 1,检查用户是否存在
     * 2,添加新用户
     * 3,ajax 返回 结果
     *
     * @return string
     */
    public function signUpAction()
    {
        try{
            $email = empty($_REQUEST['email']) ? null : trim($_REQUEST['email']);
            $password = empty($_REQUEST['password']) ? null : trim($_REQUEST['email']);
            $mobile = empty($_REQUEST['mobile']) ? null : trim($_REQUEST['mobile']);

            $model = new ModelUser();

            $user = $model->query("select count(*) as total from User WHERE email='{$email}' or mobile='{$mobile}'");

            if(isset($user['total'])){
                if($user['total']) {
                    return json_encode($this->result);
                }
            }

            $userModel = new \App\models\UserModel();
            $userId = $userModel->addOneUser($email, $password, $mobile);
            if($userId > 0) {
                $this->result['status']=true;
                $this->result['code']=100000;
            }
            return json_encode($this->result);
        }catch(\Exception $e){
            var_dump($e);exit;
        }


    }


}