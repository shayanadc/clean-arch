<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 6:33 PM
 */

namespace App\Presenters;


class UserUpdateJsonPresenter implements Presenter
{
    public function parse($output)
{
    return response()->json(
        [
            'id' => $output->id,
            'fname' => $output->fname,
            'lname' => $output->lname,
            'email' => $output->email,
            'phone' => $output->phone
        ]
        ,200);
}
    public function parseException($exception){
        return response()->json(['errors' => [['title' => 'User Not Found.']]],400);
    }
}