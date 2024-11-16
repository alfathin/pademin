<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = [];

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function monitoring() {
        return $this->hasMany(Monitoring::class);
    }
}
