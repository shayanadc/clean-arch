<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 11:25 PM
 */

namespace App\InputBoundaries;


class UserListInputBoundary implements InputBoundary
{
    public function make(array $request)
    {
        $filters = [];
        if(isset($request['email'])) $filters['email'] = $request['email'];
        if(isset($request['phone'])) $filters['phone'] = $request['phone'];
        return ['filters' => $filters];
    }
}