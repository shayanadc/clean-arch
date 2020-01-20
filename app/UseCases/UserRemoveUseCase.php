<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 4:27 PM
 */

namespace App\UseCases;


use App\Presenters\Presenter;
use App\User;

class UserRemoveUseCase
{
    private $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }
    public function perform($id){
        try{
            User::findAndDelete($id);
            return $this->presenter->parse($id);
        }catch (\Exception $exception){
            return $this->presenter->parseException($exception);
        }
    }
}