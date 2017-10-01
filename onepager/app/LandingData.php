<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingData extends Model
{
    /** @var string */
    protected $table = 'landing_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key_name', 'key_value', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
