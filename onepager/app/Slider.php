<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @var string */
    protected $table = 'slider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'title', 'image_thumb'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'position', 'created_at', 'updated_at',
    ];
}
