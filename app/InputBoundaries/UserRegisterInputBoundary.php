<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 11:41 AM
 */
namespace App\InputBoundaries;

class UserRegisterInputBoundary implements InputBoundary
{
    public function make(array $request)
    {
        return [
            'email' => $request['email'],
            'phone' => $request['phone'],
            'fname' => $request['fname'],
            'password' => $request['password'],
            'lname' => $request['lname']
        ];
    }
}