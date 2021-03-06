<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Instituition.
 *
 * @package namespace App\Entities;
 */
class Instituition extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='instituitions';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
