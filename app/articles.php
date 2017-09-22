<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    //
    protected $table='articles';
    protected $fillable = [
        'title', 'author', 'content','image','created_at','change_at'
    ];
    
}
