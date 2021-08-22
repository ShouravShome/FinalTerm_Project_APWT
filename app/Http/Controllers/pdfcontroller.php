<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pdfcontroller extends Controller
{

   
    public function store(Request $request)
    {
        
        $Creatorimage = new creatorimage();

        $Creatorimage->title = $request -> input('title');
        $Creatorimage->cdescription = $request -> input('cdescription');
        $Creatorimage-> video = 1;
        $Creatorimage-> cstatus = 1;
        $Creatorimage-> ccomplain = 1;
        $Creatorimage-> crating = 1;
        
        if($request->file ('image')){

            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->file->move ('public\assets'.$filename);
            $file->move(public_path('storage/'), $filename);

            $Creatorimage->image=$filename;

            // $Creatorimage->image = $request -> input('image');
        }
           $Creatorimage-> save();
           return redirect()->back()->with('status', 'Image Added Successfully');


        }

    }
