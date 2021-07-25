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
        'floor',
        'image',
        'detail',
        'price'

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
