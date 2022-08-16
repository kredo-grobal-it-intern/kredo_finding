<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'inquiry'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }
}
