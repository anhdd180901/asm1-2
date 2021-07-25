<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';

    protected $fillable = [
        'room_no',
        // 'room_n2323o',
        // 'room_no2323',
        // 'room_2no',
        // 'room_n23232o',
        // 'room_n32o3232',
        // 'room_n3o',
        // 'room_n2323o',
        // 'room_2323no',
    ];

    // protected $guard = [];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_services', 'room_id', 'service_id');
                                //  bang n-n         bang trung gian   lk voi nhau
    }

    public function room_service()
    {
        return  $this->hasMany(RoomService::class,'room_id' ,'id');
    }

}
