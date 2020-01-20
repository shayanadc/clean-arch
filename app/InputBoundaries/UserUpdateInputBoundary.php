<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 6:19 PM
 */

namespace App\InputBoundaries;


class UserUpdateInputBoundary implements InputBoundary
{
    public function make(array $request, $id = null)
    {
        $request['id'] = $id;
        return $request;
    }
}