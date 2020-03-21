<?php
/**
 * Created by PhpStorm.
 * User: wangjunjie
 * Date: 2020/3/21
 * Time: 16:02
 */

use CryptException;

class CryptService
{
    private $key;

    public function __construct($config=[])
    {

        $config = empty($config)?:include(__DIR__ . "/../config/crypt.php");

        if(isset($config['app_secret'])){
            throw new CryptException(5018);
        }
        $this->key =  $config['app_secret'];
    }

    /**
     * 签名
     * user: wangjunjie
     * @param $signParameter
     * @param $secret
     */
    public function sign(Array $signParameter, $secret)
    {
        if (is_null($secret)) {
            $secret = $this->key;
        }
        return Signature::sign($signParameter, $secret);
    }

    /**
     * 验签
     * user: wangjunjie
     * @param $parameter
     * @param $sign
     * @param $secret
     * @return bool
     */
    public function signCheck($parameter, $sign, $secret)
    {
        return Signature::checkSign($parameter, $sign, $secret);
    }
}
