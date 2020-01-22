<?php
/**
 * Created by PhpStorm.
 * User: shayanadc
 * Date: 1/22/20
 * Time: 1:37 PM
 */

namespace App\DataAccessRepository;


use Illuminate\Database\Eloquent\Model;

class DataAccessModel{
    public static $model;
    public function __construct(Model $model)
    {
        static::$model = $model;
    }
    public static function findAndUpdate($id, $items){
        $user = (static::$model)::findOrFail($id);
        $user->update($items);
        return $user->fresh();
    }
    public static function findAndDelete($id){
        $user = (static::$model)::findOrFail($id);
        $user->destroy($id);
    }
}