<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();

        return view('About/index', compact('abouts'));
        //return view('About/about');
    }

}
