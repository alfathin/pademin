<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relasi ke model Device
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
