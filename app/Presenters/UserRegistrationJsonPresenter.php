<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/20/20
 * Time: 12:28 PM
 */

namespace App\Presenters;


class UserRegistrationJsonPresenter implements Presenter
{
    public function parse($output)
    {
        return [
            'id' => $output->id,
            'email' => $output->email,
            'phone' => $output->phone,
            "fname" => $output->fname,
            "lname" => $output->lname
        ];
    }
}