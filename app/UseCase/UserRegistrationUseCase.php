<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 12:43 PM
 */

namespace App\UseCase;


use App\Entity\UserEntity;
use App\Presenter\Presenter;
use App\Presenter\UserRegistrationJsonPresenter;
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
        $userModel = new User();
        $newUser = $userModel->createNew($user);
        $presenter = new UserRegistrationJsonPresenter();
        return $presenter->parse($newUser);
    }
}