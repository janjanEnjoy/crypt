<?php

namespace JanjanEnjoy\Crypt\Facade;



use Illuminate\Support\Facades\Facade;
use JanjanEnjoy\Crypt\CryptService;


/**
 * Class Facade
 * @package Shaozeming\GeTui
 */
class Crypt extends Facade
{
    public static function getFacadeAccessor()
    {
        return CryptService::class;
    }
}
