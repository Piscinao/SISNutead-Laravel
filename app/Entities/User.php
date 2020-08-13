<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
//class User extendes Model
class User extends Authenticatable implements Transformable
{

    use SoftDeletes;
    use Notifiable;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    //create_at and updated_at
    public $timestamps = true;

    //sometimes table is diferrent names
    protected $table ='users';
    //sensitive parameters do not use fillable
    protected $fillable = ['cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password' ];
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value): $value;
    }



}
