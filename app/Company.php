<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Company extends Model
{
    protected $fillable = [
        'name', 'services', 'img_name', 'email', 'password',
    ];

    public function createCompany($data, $bin_image)
    {   
        return Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'services' => $data['self_introduction'],
            'img_name' => $bin_image,
        ]);
    }
}
