<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPicture extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'hotel_pictures';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'api_code',
        'hotel_id',
        'is_updated',
        'agoda_picture_id',
        'agoda_hotel_id',
        'auid',
        'uuid',
        'duid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
