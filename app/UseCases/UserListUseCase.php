<?php

namespace App\UseCases;


use App\DataAccessRepository\UserSearch;
use App\Presenters\Presenter;

class UserListUseCase{
    public $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }

    public function perform($input){
        try{
            $users =(new UserSearch())->applyFilter($input['filters']);
            return $this->presenter->parse($users);

        }catch (\Exception $exception){
            return $this->presenter->parseException($exception->getMessage());
        }

    }
}