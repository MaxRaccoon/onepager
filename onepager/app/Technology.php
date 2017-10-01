<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    /** @var string */
    protected $table = 'technology';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
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
