<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'cedula',
        'name',
        'last_name',
        'email',
        'birth_date',
        'address',
        'phone',
        'position',
    ];
}
