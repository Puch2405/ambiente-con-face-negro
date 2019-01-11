<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $sql='select id_workalbum, titulov as titulo, link
            from workalbums
            order by estado desc';

            $vid=DB::select($sql);
            /*$vid = DB::table('videos')
                ->select(DB::raw('id_video,titulo,link,tamaño'))
                ->orderBy('estado','desc')
                ->get();*/

        return view('Videos/index', compact('vid'));
    }
    /*public function show($id)
    {
        dd($id);
    }*/
}
