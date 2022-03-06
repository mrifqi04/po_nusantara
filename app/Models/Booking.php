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
        'service_id',        
        'payment',
        'status'       
    ];

    function service() {
        return $this->hasOne(Service::class,'id','service_id');
    }
}
