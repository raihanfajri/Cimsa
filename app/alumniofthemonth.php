<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumniofthemonth extends Model
{
    //
    protected $table='alumniofthemonth';
    protected $fillable = [
        'id_alumni', 'description', 'author'
    ];
}
