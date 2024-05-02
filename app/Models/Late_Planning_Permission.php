<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Late_Planning_Permission extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'late__planning__permissions';

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
                  'date_from',
                  'date_to',
                  'user_id',
                  'deadline',
                  'status_activation'
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
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Set the date_from.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateFromAttribute($value)
    // {
    //     $this->attributes['date_from'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    /**
     * Set the date_to.
     *
     * @param  string  $value
     * @return void
     */
    // public function setDateToAttribute($value)
    // {
    //     $this->attributes['date_to'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    /**
     * Get date_from in array format
     *
     * @param  string  $value
     * @return array
     */
    // public function getDateFromAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    // }

    /**
     * Get date_to in array format
     *
     * @param  string  $value
     * @return array
     */
    // public function getDateToAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    // }

}
