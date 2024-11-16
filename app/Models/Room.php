<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function device() {
        return $this->hasMany(Device::class);
    }

    public function monitoring() {
        return $this->hasMany(Monitoring::class);
    }
}
