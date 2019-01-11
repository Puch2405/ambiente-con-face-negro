<?php

namespace App\Http\Controllers\Comun;

use App\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutComunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $abouts = About::all();

        return view('Comun/About/index', compact('abouts'));
        //return view('About/about');
    }
}
