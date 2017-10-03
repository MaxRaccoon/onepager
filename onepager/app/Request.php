<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /** @var string */
    protected $table = 'request';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dt_born', 'place_born', 'post_address', 'phone', 'email'
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
