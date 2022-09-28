<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $fillable = [
        'name', 
        'user_id', 
        'services', 
        'img_name', 
        'email', 
        'password', 
        'address1', 
        'address2', 
        'city', 
        'state', 
        'country', 
        'zipcode',
        'contact_number',
        'establishment_year', 
        'president_name', 
        'total_personnel', 
        'capital',
        'gross_sales',
        'average_age',
        'homepage_url'
    ];

    public function companyUser()
    {
        return $this->belongsTo('App\User');
    }

    public function createCompany($user, $bin_image)
    {
        return Company::create(
            [
                'name' => $user->name,
                'user_id' => $user->id,
                'email' => $user->email,
                'password' => $user->password,
                'services' => $user->services,
                'contact_number' => $user->contact_number,
                'img_name' => $user->img_name,
            ]
        );
    }

    public function updateCompany($request, $bin_image)
    {   
        return Company::where('user_id', Auth::id())->update(
            [
                'name' => $request->name,
                'email' =>  $request->email,
                'img_name' => $bin_image,
                'services' => $request->services,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'zipcode' => $request->zipcode,
                'contact_number' => $request->contact_number,
                'establishment_year' => $request->establishment_year,
                'president_name' => $request->president_name,
                'total_personnel' => $request->total_personnel,
                'capital' => $request->capital,
                'gross_sales' => $request->gross_sales,
                'average_age' => $request->average_age,
                'homepage_url' => $request->homepage_url,
            ]
        );
    }
}
