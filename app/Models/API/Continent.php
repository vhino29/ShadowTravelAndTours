<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $connection = 'restapi';
    protected $table = 'continents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'auid',
        'uuid',
        'duid',
    ];

    /**
     * Get the Countries
     */
    public function countries()
    {
        return $this->hasMany(Country::class, 'continent_id');
    }

}
