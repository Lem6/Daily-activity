<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calander extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calanders';

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
                  'activity_name',
                  'date',
                  'team_id',
                  'directorate_id',
                  'center_id',
                  'all'
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
     * Get the team for this model.
     *
     * @return App\Models\Team
     */
    public function team()
    {
        return $this->belongsTo('App\Team','team_id','tid');
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



}
