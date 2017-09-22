<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalogs extends Model
{
    //
    protected $table='catalogs';
    protected $fillable = [
        'name', 'price', 'description','image','created_at','change_at'
    ];
}
