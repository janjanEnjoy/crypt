<?php
/**
 * Created by PhpStorm.
 * User: wangjunjie
 * Date: 2020/3/21
 * Time: 16:02
 */

namespace JanjanEnjoy\Crypt;

use JanjanEnjoy\Crypt\Exceptions\CryptException;

class CryptService
{
    private $key;

    /**
     * 构造方法
     * CryptService constructor.
     * @param array $config
     * @throws CryptException
     */
    public function __construct($config = [])
    {

        $config = empty($config) ?: config('crypt')??include(__DIR__ . "/../config/crypt.php");

        if (!isset($config['app_secret'])) {
            throw new CryptException(5018);
        }
        $this->key = $config['app_secret'];
    }

    /**
     * 签名
     * user: wangjunjie
     * @param array $signParameter
     * @param $secret
     * @return string
     */
    public function sign(Array $signParameter, $secret = null)
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
    public function signCheck($parameter, $sign, $secret = null)
    {
        return self::sign($parameter, $secret) == $sign;
    }
}
