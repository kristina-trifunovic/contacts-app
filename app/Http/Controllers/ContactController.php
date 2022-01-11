<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show() {
        $contacts = Contact::all();

        return view('contacts', [
            'contacts' => $contacts,
          ]);
    }

    public function create() {
        return view('create');
    }

    public function store() {
        $contact = new Contact();

        $contact->first_name = request('first_name');
        $contact->last_name = request('last_name');
        $contact->phone_number_type = request('phone_number_type');
        $contact->phone_number = request('phone_number');
        $contact->save();

        return redirect('/contacts');
    }
}
