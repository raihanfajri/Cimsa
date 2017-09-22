<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    //
    protected $table='activities';
    protected $fillable = [
        'title', 'author', 'content','image','created_at','change_at'
    ];
}
