<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concat;
use App\Contact;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contact()
    {
        return view('front_end.contact');
    }
    public function save_contact(Request $request)
    {
        Contact::insert([
           'name' => $request->name,
           'email' => $request->email,
           'message' => $request->message,
           'created_at' => Carbon::now(),
        ]);

        Toastr::success('Your information saved', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    function viewAllContacts(){
        $contacts = Contact::latest()->get();
        return view('back_end.contact',compact('contacts'));
    }

    function contactDetails(Contact $contact){
      return view('back_end.contactDetails',compact('contact'));
    }
}
