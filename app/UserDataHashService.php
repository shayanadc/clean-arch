<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/22/20
 * Time: 1:21 PM
 */

namespace App;


class UserDataHashService
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
        $password = (new BcryptHashMaker())->make($data['password']);
        $this->data['password'] = $password;
        return $this;
    }
}