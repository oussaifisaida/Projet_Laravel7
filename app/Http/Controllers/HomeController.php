<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Testimonial;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $contacts = Contact::count();
        $testimonials = Testimonial::count();
        return view('home', compact('users', 'contacts', 'testimonials'));
    }

    public function listUsers(){
     $users = User::paginate(5);
     return view('admin.users.index', compact('users'));
    }

     public function listContacts(){
         $contacts = Contact::paginate(5);
         return view('admin.contacts.index', compact('contacts'));
    }

    public function deleteContact($id){
        //dd($id);
        $contact = Contact::find($id)->delete();
        if($contact){
            return back()->with('info','Contact deleted successfully!');
        }
    }
}
