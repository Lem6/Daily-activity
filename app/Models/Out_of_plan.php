<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Out_of_plan extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'out_of_plans';

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
                  'activity',
                  'date',
                  'user_id',
                  'team_id',
                  'directorate_id',
                  'center_id',
                  'approved_by',
                  'reject_reason'
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
        return $this->belongsTo('App\Models\Team','team_id');
    }

    /**
     * Get the directorate for this model.
     *
     * @return App\Models\Directorate
     */
    public function directorate()
    {
        return $this->belongsTo('App\Models\Directorate','directorate_id');
    }

    /**
     * Get the center for this model.
     *
     * @return App\Models\Center
     */
    public function center()
    {
        return $this->belongsTo('App\Models\Center','center_id');
    }

    /**
     * Get the approvedBy for this model.
     *
     * @return App\Models\ApprovedBy
     */
    public function approvedBy()
    {
        return $this->belongsTo('App\Models\ApprovedBy','approved_by');
    }



}
