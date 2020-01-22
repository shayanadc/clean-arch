<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 12:43 PM
 */

namespace App\UseCases;


use App\Entities\UserEntity;
use App\Presenters\Presenter;
use App\Presenters\UserRegistrationJsonPresenter;
use App\User;

class UserRegistrationUseCase
{
    private $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }
    public function perform($data)
    {
        $userEntity = new UserEntity();
        $user = $userEntity->create($data);
        $newUser = User::createNew($user);
        return (new UserRegistrationJsonPresenter())->parse($newUser);
    }
}