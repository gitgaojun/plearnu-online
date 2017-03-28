<?php
namespace models\mysql;
use models\mysql\ModelBase as Base;
use http\client;

/**
 * Class ModelUser
 * @package models\mysql
 */
class ModelUser extends Base
{

    static public function getInstance()
    {
        return parent::getInstance();
    }

    public function addOneUser($name, $email, $password, $mobile)
    {
        $ip = (new client)->getIP();
        return parent::query("insert into User (`name`, `email`, `password`, `mobile`, `login_count`, `ip`) values('{$name}', '{$email}', '{$password}', '{$mobile}', '1', '{$ip}')");
    }

}