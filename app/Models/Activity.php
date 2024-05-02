<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';

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
                  'date',
                  'plan_task_id',
                  'user_id',
                  'color_id'
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
    
    /**
     * Get the planTask for this model.
     *
     * @return App\Models\PlanTask
     */
    public function planTask()
    {
        return $this->belongsTo('App\Models\PlanTask','plan_task_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    /**
     * Get the color for this model.
     *
     * @return App\Models\Color
     */
    public function color()
    {
        return $this->belongsTo('App\Models\Color','color_id');
    }



}
