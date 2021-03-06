<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $connection = 'restapi';
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'continent_id',
        'iso',
        'iso2',
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
     * Get the Continent
     */
    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id');
    }

    /**
     * Get the Cities
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }

}
