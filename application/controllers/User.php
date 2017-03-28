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
            $password = empty($_REQUEST['password']) ? null : trim($_REQUEST['password']);
            $mobile = empty($_REQUEST['mobile']) ? null : trim($_REQUEST['mobile']);

            /*** 过滤数据  *****/
            $userForm = new Form('sign_up_form');
            $userForm->validation();

            $model = ModelUser::getInstance();


            $model1 = ModelUser::getInstance();
            var_dump(($model===$model1));exit;

            var_dump($model);exit;

            $model1 = $model;
//            $model1 = new ModelUser();


//            var_dump($model, $model1);exit;
            var_dump(($model===$model1));exit;

            $user = $model->query("select count(*) as total from User WHERE email='{$email}' or mobile='{$mobile}'");

//            var_dump( isset($user['total']));exit;
            if(isset($user['total'])){
                echo json_encode(array_merge($this->result, array('message'=>'该用户已经注册, 请登陆')), JSON_UNESCAPED_UNICODE); exit;
            }
            //    2
            $userId = $model->addOneUser($mobile, $email, $password, $mobile);
            var_dump($userId);exit;
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