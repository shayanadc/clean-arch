<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 11:23 PM
 */

namespace App\Presenters;


class UserListJsonPresenter implements Presenter
{
    public function parse($output)
    {
       return response()->json($output->map->only(['id', 'email', 'phone']),200);
    }
    public function parseException($exception)
    {
        return response()->json($exception,200);
    }
}