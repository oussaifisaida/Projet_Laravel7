<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(5);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request-> all();
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        // dd($data);
        $monial = Testimonial::create($data);
        if ($monial){
            return redirect('listTestimonials')->with('success', 'Testimonial crée avec success');
        }
    }

    public function uploadImage($file)
    {
        $extension = $file->getClientOriginalExtension(); //.jpg
        $sha1 = sha1($file->getClientOriginalName()); //cryptage name
        $filename = date('Y-m-d-h-i-s') . "_" . $sha1 . "." . $extension;
        $path = public_path('image/testimonials/');
        $file->move($path, $filename);
        return 'image/testimonials/' . $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $testimonial = Testimonial::find($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $image = $data['photo'];
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
            unlink($image);// supre image
        }
        else {
            $data['image'] = $image;
        }
        $monial = Testimonial::find($id)->update($data);
        if($monial)
        {
            return redirect('listTestimonials')
            ->with('success', 'Testimonial update avec success');
        }

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $image = $testimonial['image'];
        $monial = $testimonial->delete();

        if($monial)
        {
            unlink($image);
        }   return back()->with('info', 'Testimonial deleted successfully');
        
    }
}
