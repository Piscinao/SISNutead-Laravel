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

    //retirar caso queira llistar
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

    public function courses()
    {
        // N para N
        return $this->belongsToMany(User::class, 'user_courses');
    }

    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value): $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 3, 3)  . '-'. substr($cpf, -2);


    }


    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];
        return "(" .substr($phone, 0, 2) . ")" . substr($phone, 2, 4) . "-" .substr($phone, -4);


    }

    public function getFormattedBirthAttribute()
    {
        $birth = explode( '-', $this->attributes['birth']);

        if(count($birth) != 3)
        return "";

        $birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];

        return $birth;


    }


}
