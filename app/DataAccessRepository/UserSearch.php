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
    if(isset($request['email'])){
        $this->users = $this->users->email($request['email']);
    }
    if(isset($request['phone'])){
        $this->users = $this->users->phone($request['phone']);
    }
    return $this->users->get();
}
}