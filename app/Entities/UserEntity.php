<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 11:55 AM
 */

namespace App\Entities;


use App\BcryptHashMaker;
use App\HashMakerInterface;

class UserEntity
{
    public $email;
    public $phone;
    public $fname;
    public $lname;
    public $password;
    private $hashMakerInterface;
    public function __construct()
    {
        $this->hashMakerInterface = new BcryptHashMaker();
    }

    public function create(array $array)
    {
        $this->email = $array['email'];
        $this->phone = $array['phone'];
        $this->fname = $array['fname'];
        $this->lname = $array['lname'];
        $this->password =$array['password'];
        return $this;
    }


}