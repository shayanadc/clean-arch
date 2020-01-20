<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 2:11 PM
 */

namespace App;


class BcryptHashMaker implements HashMakerInterface
{

    static $testHash = null;
    public static function make($string){
        return static::$testHash ?:bcrypt($string);
    }

    public static function setTest($string){
        static::$testHash = $string;
    }
}