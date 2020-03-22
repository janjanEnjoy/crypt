<?php
/**
 * Created by PhpStorm.
 * User: wangjunjie
 * Date: 2020/3/21
 * Time: 15:58
 */

namespace JanJanEnjoy\Crypt\Exceptions;

class CryptException extends \Exception
{
    protected static $errorMsgs = [
        5010 => '签名失败',
        5011 => '验签失败',
        5012 => '加密失败',
        5013 => "解密失败",
        5014 => "Could not encrypt the data",
        5015 => "Could not decrypt the data.",
        5016 => "The payload is invalid.",
        5017 => "The MAC is invalid.",
        5018 => "配置文件缺少app_secret配置.",
    ];


    public function __construct($code)
    {
        $message = self::$errorMsgs[$code];
        parent::__construct($message, $code);
    }

}
