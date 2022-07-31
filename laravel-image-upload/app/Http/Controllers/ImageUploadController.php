<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Postimage;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_image');
    }


    public function viewImage(){
        $imageData= Postimage::all();
        return view('index', compact('imageData'));
    }


    public function storeImage(Request $request)
    {
        $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
    }


    // public function index()
    // {
    //     return view("index");
    // }


}
