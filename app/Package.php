<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $guarded = [];

    public function outlets()
    {
        return $this->belongsToMany(Outlet::class);
    }
}
