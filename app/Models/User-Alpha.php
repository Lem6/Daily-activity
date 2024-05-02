<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'organization_id',
        'chairman'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_active(){
        if($this->active){
            return true;
        }
        return false;
    }
    public function todaytask()
    {
        return $this->hasMany('App\Models\Plan_Task','user_id')->whereDate('created_at', Carbon::today())->whereIn('task_type', ['0', '1']);
    }
    public function PlanTask()
    {
        return $this->hasMany('App\Models\Plan_Task','user_id');
    }
    public function organazation()
    {
        return $this->belongsTo('App\Models\Organization','organization_id');
    }

    public function permission()
    {
        return $this->hasOne('App\Models\Additional_Time','user_id')->whereDate('date', Carbon::today());
    }
}
