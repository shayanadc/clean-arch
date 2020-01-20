<?php

namespace App;

use App\Entities\UserEntity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function createNew(UserEntity $entity){
        return User::create([
            'email' => $entity->email,
            'fname' => $entity->fname,
            'lname' => $entity->lname,
            'password' => $entity->password,
            'phone' => $entity->phone
        ]);
    }
    public static function findAndUpdate($id, $items){
        $user = User::findOrFail($id);
        $user->update($items);
        return $user->fresh();
    }
    public static function findAndDelete($id){
        $user = User::findOrFail($id);
        $user->destroy($id);
    }
}
