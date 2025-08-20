<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['nama_bus', 'plat', 'asal', 'tujuan', 'harga'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
