<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 17-3-12
 * Time: 下午12:02
 */
namespace http;

class client
{

    /**
     * 获取客户端访问的ip地址
     * @return mixed
     */
    public function getIP()
    {
        if( isset($_SERVER['HTTP_X_FORWARDED_FOX']) )
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOX'];
        } elseif( isset($_SERVER['HTTP_CLIENT_IP']) ) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}