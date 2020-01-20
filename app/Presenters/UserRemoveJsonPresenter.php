<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 4:26 PM
 */

namespace App\Presenters;


class UserRemoveJsonPresenter implements Presenter{
    public function parse($output)
    {
        return response()->json(["message" => 'user ' . $output . ' deleted successfully'],200);
    }
    public function parseException($exception){
        return response()->json(["errors" =>  [ ["title" => "User Id Not Found."]]],400);
    }
}