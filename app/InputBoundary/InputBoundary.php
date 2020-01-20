<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 11:40 AM
 */
namespace App\InputBoundary;
interface InputBoundary{
    public function make(array $request);
}