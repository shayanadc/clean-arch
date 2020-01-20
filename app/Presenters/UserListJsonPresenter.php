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
       return $output->map->only(['id', 'email', 'phone']);
    }
    public function parseException($output)
    {

    }
}