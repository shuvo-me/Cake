<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'user_id',
        'image',
        'contact',
        'nid'
    ];
}
