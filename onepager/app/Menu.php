<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @var string */
    protected $table = 'menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'title'
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
