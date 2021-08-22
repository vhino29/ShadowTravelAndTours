<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'description',
        'longitude',
        'latitude',
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
     * Get the Country
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


    /**
     * Get the City with area
     */
    public function cityWithAreas()
    {
        return $this->hasMany(CityWithArea::class, 'city_id');
    }
}
