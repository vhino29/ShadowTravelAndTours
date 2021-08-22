<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'hotels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api_code',
        'city_id',
        'name',
        'address_line_1',
        'address_line_2',
        'postal_code',
        'state',
        'city',
        'country',
        'star_rating',
        'popularity_score',
        'number_of_reviews',
        'rating_average',
        'overview',
        'longitude',
        'latitude',
        'infant_age',
        'children_age_from',
        'children_age_to',
        'children_stay_free',
        'min_guest_age',
        'accommodation_type',
        'auid',
        'uuid',
        'duid',
    ];
    
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

    /**
     * Get the Picture
     */
    public function picture()
    {
        return $this->hasOne(HotelPicture::class, 'hotel_id')->oldest();
    }

    /**
     * Get the Pictures
     */
    public function pictures()
    {
        return $this->hasMany(HotelPicture::class, 'hotel_id');
    }
}
