<?php

namespace App\Http\Controllers;

use App\Contact;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(){
        return view('menu_top.contacts.contact_us');
    }

    public function confirm(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'email' => 'required|email|max:50',
            'inquiry' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                    ->route('contact.show')
                    ->withErrors($validator);
        }

        return view('menu_top.contacts.confirm', $request);
    }

    public function complete(Request $request){
        if ($request->input('back') == 'back'){
            return redirect()
                    ->route('contact.show')
                    ->withInput($request->except('back'));
        }

        Contact::create([
            'user_id' => (Auth::check()) ? Auth::user()->id : NULL,
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'inquiry' => $request['inquiry'],
        ]);

        return view('menu_top.contacts.complete');
    }

    public function contact(){
        return view('mypage.contact');
    }
}
