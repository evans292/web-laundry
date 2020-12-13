<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
