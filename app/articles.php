<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    //
    protected $table='articles';
    protected $fillable = [
        'id','title', 'author', 'content','image'
    ];
    
}
