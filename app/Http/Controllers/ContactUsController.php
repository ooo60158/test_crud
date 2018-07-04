<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact.index')->with('email',  'ser@ser.com');
    }

    public function store()
    {
        
        var_dump(request()->all());

        $newContact = new Contact();
        $newContact->firstName = request()->get('name');
        $newContact->lastName = request()->get('surname');
        $newContact->email = request()->get('email');
        $newContact->phone = request()->has('phone') ? request()->get('phone') : '';
        $newContact->message = request()->get('message');
        $newContact->save();
        dd(request()->all());
    }
    //
}
