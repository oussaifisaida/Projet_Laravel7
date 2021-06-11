<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Testimonial;
class PageController extends Controller
{

    public function service(){
     return view('pages.service');
    }

    public function about(){
    	return view('pages.about');
    }

    public function testimonial(){
      $testimonials = Testimonial::limit(3)->get();

    	return view('pages.testimonial' , compact('testimonials'));
    }

    public function contact(){
    	return view('pages.contact');
    }

    public function sendMessage(Request $request){
      $data = $request->all();
      //dd($data);
      $contact = Contact::create($data);
      if($contact){
        return back()->with('success','Send Message created successfully!');
      }
    }
}
