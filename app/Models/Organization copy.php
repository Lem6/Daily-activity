<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Organization extends Model
{
    //
    protected $parentColumn = 'parent_id';

    public function parent()
    {
        return $this->belongsTo(Organization::class,$this->parentColumn);
    }

    public function children()
    {
        return $this->hasMany(Organization::class, $this->parentColumn)->with('experts');
    }
    public function experts()
    {
        return $this->hasMany('\App\User', 'organization_id','id')->where('id','!=',Auth::user()->id)->where('chairman',0);
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
