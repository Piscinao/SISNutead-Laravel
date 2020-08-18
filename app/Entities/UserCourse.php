<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserCourse extends Model


{
    use Notifiable;

    public $timestamps = true;

    //sometimes table is diferrent names
    protected $table ='user_courses';
    //sensitive parameters do not use fillable
    protected $fillable = ['user_id', 'course_id', 'permission'];
    protected $hidden = [];

        //
}
