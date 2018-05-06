<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午12:52
 */

namespace App\Src\Model;

use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'phone', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}