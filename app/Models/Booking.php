<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'tanggal',
        'jam_id',
        'service_id',
        'dokter_id',
        'status',
        'messages'  
    ];

    function service() {
        return $this->hasOne(Service::class,'id','service_id');
    }

    function jam() {
        return $this->hasOne(JamOperasional::class,'id','jam_id');
    }
}
