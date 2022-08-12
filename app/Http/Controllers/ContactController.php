<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    private $contact;
    private $user;

    public function __construct(Contact $contact, User $user){
        $this->contact = $contact;
        $this->user = $user;
    }

    public function index(){
        if (Auth::check()) {
            $contactUser = $this->user->find(Auth::user()->id);        
            return view('menu_top.contacts.contact_us')->with('contactUser', $contactUser);
        } else {
            return view('menu_top.contacts.contact_us');
        }
    }

    public function confirm(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'email' => 'required|email|max:50|',
            'inquiry' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                    ->route('contacts')
                    ->withErrors($validator);
        }
        
        return view('menu_top.contacts.confirm', $request);
    }

    public function complete(Request $request){
        if ($request->input('back') == 'back'){
            return redirect()
                    ->route('contacts')
                    ->withInput($request->except('back'));
        }     

        if (Auth::check()){
            $this->contact->user_id = Auth::user()->id;
        } else {
            $this->contact->user_id = 0;
        }

        Contact::create([
            'user_id' => $this->contact->user_id,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'inquiry' => $request['inquiry'],
        ]);
        
        return view('menu_top.contacts.complete');
    }
}
