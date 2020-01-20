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
        if(isset($request['email'])) array_push($filters, $request['email']);
        if(isset($request['phone'])) array_push($filters, $request['phone']);
        return ['filter' => $filters];
    }
}