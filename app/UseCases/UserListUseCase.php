<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/21/20
 * Time: 12:23 AM
 */

namespace App\UseCases;


use App\Presenters\Presenter;
use App\User;

class UserListUseCase{
    public $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }

    public function perform($input){
        try{
            $users = new User();
            if(isset($input['filters']['email'])){
                $users = $users->where('email', $input['filters']['email']);
            }
            if(isset($input['filters']['phone'])){
                $users = $users->where('phone', $input['filters']['phone']);
            }
            $users = $users->get();
            return $this->presenter->parse($users);
        }catch (\Exception $exception){
            return $this->presenter->parseException($exception->getMessage());

        }

    }
}