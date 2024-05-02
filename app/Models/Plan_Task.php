<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Andegna\DateTime as Et;
use DateTime;
class Plan_Task extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plan__tasks';
    // public $timestamps = false;

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
                   'created_at',
                  'task_name',
                  'progress',
                  'percent',
                  'description',
                  'challenge',
                  'approved_by',
                  'approved_status',
                  'reject_reason',
                  'user_id',
                  'team_id',
                  'directorate_id',
                  'center_id',
                  'plan_task_id',
                  'date',
                  'progress_time',
                  'color_id',
                  'user_id',
                  'planing_time',
                  'given_by',
                  'task_type',
                  'parent_id'
               
                  
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at','updated_at'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the approvedBy for this model.
     *
     * @return App\Models\ApprovedBy
     */
//     public function setCreatedAtAttribute()
// {
//     $gregorian = new DateTime(date('Y-m-d'));
//     $ethipic = new Et($gregorian);
    
//     $this->attributes['created_at'] = '2013-08-03 11:43:48';
// }
    public function approvedBy()
    {
        return $this->belongsTo('App\Models\ApprovedBy','approved_by');
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
     * Get the team for this model.
     *
     * @return App\Models\Team
     */
    public function team()
    {
        return $this->belongsTo('App\Team','team_id');
    }

    /**
     * Get the directorate for this model.
     *
     * @return App\Models\Directorate
     */
    public function directorate()
    {
        return $this->belongsTo('App\Directorate','directorate_id');
    }

    /**
     * Get the center for this model.
     *
     * @return App\Models\Center
     */
    public function center()
    {
        return $this->belongsTo('App\Center','center_id');
    }

    /**
     * Get the planTask for this model.
     *
     * @return App\Models\PlanTask
     */
    public function planTask()
    {
        return $this->belongsTo('App\Models\PlanTask','plan_task_id');
    }

    public function getCreatedAtAttribute()
{
    return   date("Y-m-d",strtotime($this->attributes['created_at']));
}
// get  time difference
public function getPtimeAttribute()
{


date_default_timezone_set("Africa/Addis_Ababa");
$time=date("h:i:s",strtotime('-6 hours')) ;
$newtimestamp = strtotime($time.' + 6 minute');
//dd($newtimestamp);
//$time=date($time,strtotime($this->attributes['planing_time']));
dd($time->modify('+5 minutes'));


//strtotime($this->attributes['planing_time']))/2;
return $time;
}

public function color()
    {
        return $this->belongsTo('App\Models\Color','color_id');
    }
}