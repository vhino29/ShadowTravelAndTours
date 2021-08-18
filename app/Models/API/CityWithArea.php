<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityWithArea extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'city_with_areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'name',
        'description',
        'longitude',
        'latitude',
        'auid',
        'uuid',
        'duid',
    ];

    /**
     * Get the City
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
