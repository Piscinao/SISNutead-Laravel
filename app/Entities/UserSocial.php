<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserSocial extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;



    public $timestamps = true;

    //sometimes table is diferrent names
    protected $table ='user_socials';
    //sensitive parameters do not use fillable
    protected $fillable = ['user_id', 'social_network', 'social_id', 'social_email', 'social_avatar' ];
    protected $hidden = [];




}

