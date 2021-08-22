<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contentcontroller extends Controller
{
    public function photo()
    {
        return view ('user.photo');

    }

    public function book()
    {
        return view ('user.book');

    }

    public function video()
    {
        return view ('user.video');

    }

    public function creator()
    {
        return view ('index.creator');

    }

    public function creatorimgshow()
    {
        return view ('user.creatorimgshow');

    }

    public function creatorvidshow()
    {
        return view ('user.creatorvidshow');

    }

    public function creatorpdfshow()
    {
        return view ('user.creatorpdfshow');

    }


     

}
