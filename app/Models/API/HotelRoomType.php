<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'hotel_room_types';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'auid',
        'uuid',
        'duid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
