<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Course extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'instituition_id'
    ];


    public function userCourse()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function users()
    {
        // N para N - passar chaves como parametro caso necessário
        return $this->belongsToMany(User::class, 'user_courses');
    }

    public function instituitionCourse()
    {
        return $this->belongsTo(Instituition::class, 'instituition_id');

    }

}
