<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $fillable = [
        'user_id',
        'image',
        'contact',
        'nid',
    ];
}
