<?php

namespace App\Http\Controllers;

use App\Models\creatorimage;
use Illuminate\Http\Request;


class contentphotocontroller extends Controller
{
   
    public function creatorimg()
    {
        return view ('creatorimage');

    }

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

        public function display()
        {
            $Creatorimages = creatorimage::all();
            return view('contentshow.imageshow')-> with('Creatorimages',$Creatorimages);
        }

        public function displays()
        {
            $Creatorimagers = creatorimage::all();
            return view('contentindex.creator')-> with('Creatorimagers',$Creatorimagers);
            //echo "displayes";
        }
       


        public function edit($id)
        {
            $Creatorimages = creatorimage::find($id);
            return view('contentupdate.imageupdate')-> with('Creatorimages',$Creatorimages);
        }

        public function delete($id)
        {
            $Creatorimages = creatorimage::find($id);
            $Creatorimages -> delete();
            return redirect('photo')->with('status','Image Deleted Successfully');
            

        }

        public function view($id)
        {
            $Creatorimages = creatorimage::find($id);
            return view('contentshow.showimagefile', compact('Creatorimages'));
        }
        
        public function download($image)
        {
          
        }

    }



