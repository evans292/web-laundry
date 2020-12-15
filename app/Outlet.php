<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    //
    protected $guarded = [];

    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
