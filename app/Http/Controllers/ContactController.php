<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact){
        $this->contact = $contact;
    }

    public function index(){
        return view('menu_top.contacts.contact_us');
    }

    // public function process(Request $request){
    //     $contact = $request->fill($request->all());
    // }

    public function confirm(Request $request){
        $contact = $request->except('action');
        print_r($contact);

        $contact = $request->all();
        return view('menu_top.contacts.confirm', $contact);
    }

    public function complete(Request $request){
        // $action = $request->get('action', 'return');
        // $contact->fill($request->all())->save();
        // $inquiry = $request->except('action');

        // $action = $request->input('action');
        $contact = $request->except('return');

        if ($request->has('submit')) {
            $this->contact->save();
            return view('menu_top.contacts.complete');

        } else {
            return redirect()->route('contacts')->withInput($contact);
        }
    }
}
