<?php

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
                $users = $users->email($input['filters']['email']);
            }
            if(isset($input['filters']['phone'])){
                $users = $users->phone($input['filters']['phone']);
            }
            $users = $users->get();

            return $this->presenter->parse($users);

        }catch (\Exception $exception){
            return $this->presenter->parseException($exception->getMessage());
        }

    }
}