<?php

namespace App\Http\Controllers;

use App\Models\orderstatus;
use App\Models\creatorimage;
use Illuminate\Http\Request;
use Validator;


class photocontroller extends Controller
{
   

    public function index()
    {
        $Creatorimage = creatorimage::orderBy('id', 'title','image','cdescription')->get();
        return response()->json($Creatorimage);
    }

    public function stored (Request $request)
    {
        $Creatorimage = new creatorimage;
        $Creatorimage->title = $request->title;
        $Creatorimage->cdescription = $request->cdescription;
        $Creatorimage->image = $request->image;
        $Creatorimage->video = $request->video;
        $Creatorimage->pdf = $request->pdf;
        $Creatorimage->cstatus = $request->cstatus;
        $Creatorimage->save();
        return response()->json($request);
    }

    public function show()
    {
        $Creatorimage = creatorimage::all();
        return response()->json($Creatorimage);
    }

    public function updated (Request $request, $id)
    {
        $Creatorimage = creatorimage::findOrFail($id);
        $Creatorimage->title = $request->title;
        $Creatorimage->cdescription = $request->cdescription;
        $Creatorimage->image = $request->image;
        $Creatorimage->save();
        return response()->json($request);
    }

    public function destroy($id)
    {
        $Creatorimage = creatorimage::findOrFail($id);
        $Creatorimage->delete();
        return response()->json($Creatorimage);
    }
















    
    public function creatorimg()
    {
        return view ('creatorimage');

    }

    public function store(Request $request)
    {

        $validation = Validator:: make($request->all(), [
            'title' => 'required',
            'cdescription' => 'required',

            // 'image' => 'required',
            // 'pdf' => 'required',
            // 'video' => 'required',
           
            
        ]);
        if ($validation->fails()){
            // return redirect()->route('image.validation')->with('errors',$validation->errors());

            return redirect()->back()
           ->withInput()
           ->withErrors($validation);
        }

        // creatorimage::create($data);
        // return redirect::to('jpgshow')->withSuccess('Done');


        $Creatorimage = new creatorimage();

        $Creatorimage->title = $request -> input('title');
        $Creatorimage->cdescription = $request -> input('cdescription');
        
        
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


        

        public function edit($id)
        {
            $Creatorimages = creatorimage::find($id);
            return view('contentupdate.imageupdate')-> with('Creatorimages',$Creatorimages);
        }

    


        public function update(Request $req, $id)
        {

            $Creatorimages=creatorimage::find($id);
            $Creatorimages->title = $req->title;
            $Creatorimages->cdescription = $req->cdescription;
            $file=$req->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->file->move ('public\assets'.$filename);
            $file->move(public_path('storage/'), $filename);

            $Creatorimages->image=$filename;

            // $Creatorimage->image = $request -> input('image');
    
           $Creatorimages-> save();
           return redirect()->back()->with('status', 'Image Added Successfully');

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





        public function view11($id)
        {
            $Creatorimages = creatorimage::find($id);
            return view('contentshow.showvidfile', compact('Creatorimages'));
            
        }

        public function view22($id)
        {
            $Creatorimages = creatorimage::find($id);
            return view('contentshow.showpdffile', compact('Creatorimages'));
            
        }
        
        public function download($image)

        {
          return response()->download('storage/'. $image);
        }

        public function displays33()
        {
            $Creatorimages = orderstatus::all();
            return view('contentshow.ordershow')-> with('Creatorimages',$Creatorimages);
        }

        public function videoshow()
        {
            $Creatorimages = creatorimage::all();
            return view('user.creatorvidshow')-> with('Creatorimages',$Creatorimages);
        }

        public function pdfshow()
        {
            $Creatorimages = creatorimage::all();
            return view('user.creatorpdfshow')-> with('Creatorimages',$Creatorimages);
        }


        public function display(Request $req)
        {
            $Creatorimages = creatorimage::all();
            return view('contentshow.imageshow')-> with('Creatorimages',$Creatorimages);
        }

        public function displays()
        {
            $Creatorimages = creatorimage::all();
            return view('contentindex.creator')-> with('Creatorimages',$Creatorimages);
        }

        public function displays11()
        {
            $Creatorimages = creatorimage::all();
            return view('contentshow.videoshow')-> with('Creatorimages',$Creatorimages);
        }

        public function displays22()
        {
            $Creatorimages = creatorimage::all();
            return view('contentshow.pdfshow')-> with('Creatorimages',$Creatorimages);
        }






        public function store11(Request $request)
        {
            
            $Creatorimage = new creatorimage();
    
            $Creatorimage->title = $request -> input('title');
            $Creatorimage->cdescription = $request -> input('cdescription');
            
            
            if($request->file ('video')){
    
                $file=$request->file('video');
                $filename=time().'.'.$file->getClientOriginalExtension();
                // $request->file->move ('public\assets'.$filename);
                $file->move(public_path('storage/'), $filename);
    
                $Creatorimage->video=$filename;
    
                // $Creatorimage->image = $request -> input('image');
            }
               $Creatorimage-> save();
               return redirect()->back()->with('status', 'Video Added Successfully');
    
            }

            public function store22(Request $request)
    {
        
        $Creatorimage = new creatorimage();

        $Creatorimage->title = $request -> input('title');
        $Creatorimage->cdescription = $request -> input('cdescription');
        
        if($request->file ('pdf')){

            $file=$request->file('pdf');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->file->move ('public\assets'.$filename);
            $file->move(public_path('storage/'), $filename);

            $Creatorimage->pdf=$filename;

            // $Creatorimage->image = $request -> input('image');
        }
           $Creatorimage-> save();
           return redirect()->back()->with('status', 'Content Added Successfully');

        }



    }



