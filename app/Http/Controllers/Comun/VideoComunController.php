<?php

namespace App\Http\Controllers\Comun;

use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoComunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select id_workalbum,titulov as titulo, link
            from workalbums
            order by estado desc';

        $vid=DB::select($sql);

        return view('Comun/Video/index', compact('vid'));
    }
   /* public function show($id)
    {
        dd($id);
    }*/

}
