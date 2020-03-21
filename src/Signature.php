<?php
/**
 * Created by PhpStorm.
 * User: wangjunjie
 * Date: 2020/3/21
 * Time: 16:11
 */


class Signature
{
    /**
     * 签名
     * user: wangjunjie
     * @param array $signParameter
     * @param $secret
     * @return string
     */
    public static function sign(Array $signParameter, $secret)
    {
        $array = self::arrayToString($signParameter);
        ksort($array);
        return md5(json_encode($array, true) . $secret);
    }

    /**
     * 数组每一项转字符串
     * user: wangjunjie
     * @param array $array
     * @return array
     */
    public static function arrayToString(Array &$array)
    {
        $array = array_filter($array, function ($item) {
            return !empty($item);
        });

        $array = array_map(function (&$item) {
            if (is_array($item)) {
                return self::arrayToString($item);
            }
            return strval($item);
        }, $array);
        return $array;
    }

    /**
     * 延签
     * user: wangjunjie
     * @param $parameter
     * @param $sign
     * @param $secret
     * @return bool
     */
    public static function checkSign($parameter, $sign, $secret)
    {
        return self::sign($parameter, $secret) == $sign;
    }
}
