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
     * Get the Countries
     */
    public function countries()
    {
        return $this->hasMany(Country::class, 'continent_id');
    }

}
