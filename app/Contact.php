<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'inquiry'
    ];
}
