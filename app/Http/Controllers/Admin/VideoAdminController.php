<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use App\Http\Requests\VideoStoreRequest;
use App\Http\Requests\VideoUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select videos.id_video,videos.titulo,videos.link,videos.estado
            from videos
            order by estado desc';

        $videos=DB::select($sql);

        return view("Admin/Video/index",['videos'=>$videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Video/video_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoStoreRequest $request)
    {
        $estado=1;
        $post = Video::create([
           'titulo'=>$request['titulo'],
           'link'=>$request['link'],
           'estado'=>$estado
        ]);
        return redirect('Videos/Admin')
            ->with('info','Registro exitoso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::select('call  PRIORIDAD_VIDEO (?)',array($id));
        return redirect('Videos/Admin')->with('info','Actualizacion exitosa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('videos')
            ->select(DB::raw('id_video,titulo,link'))
            ->where(['id_video'=>$id])
            ->get();
        return view('Admin/Video/video_update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request,$id)
    {
        $post = DB::table('videos')
            ->where('id_video',$id)
            ->update(['titulo'=>$request->titulo,'link'=>$request->link]);

        return redirect('Videos/Admin')
        ->with('info','Registro actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('videos')
            ->where('id_video',$id)->delete();
        return redirect('Videos/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
