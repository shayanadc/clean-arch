<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 6:55 PM
 */

namespace App\UseCases;


use App\DataAccessRepository\DataAccessModel;
use App\Presenters\Presenter;
use App\User;

class UserUpdateUseCase{
    private $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }
    public function perform($input){
        try{
            unset($input['password']);
            unset($input['email']);
            $user = new User();
            $m = new DataAccessModel($user);
            $user = $m::findAndUpdate($input['id'], $input);
            return $this->presenter->parse($user);
        }catch (\Exception $exception){
            return $this->presenter->parseException($exception);
        }
    }
}