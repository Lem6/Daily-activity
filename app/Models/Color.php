<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colors';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_start_time',
        'plan_end_time',
        'progress_start_time',
        'edit_time',
        'color',
        'name'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

public function getPlanStartAttribute()
{


return strtotime($this->attributes['plan_start_time']);
}

public function getPlanEndAttribute()
{


return strtotime($this->attributes['plan_end_time']);
}
// public function getEditTimeAttribute()
// {


// return strtotime($this->attributes['end_time']);
// }
}
