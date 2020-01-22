<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/22/20
 * Time: 10:33 PM
 */

namespace App\DataAccessRepository;


use App\User;

class UserSearch
{
    public  $users;
    public function __construct()
    {
        $this->users = new User();
    }

    public function applyFilter($request){
        foreach ($request as $item => $value){
            $this->users = $this->users->$item($value);
        }
        return $this->users->get();
}
}