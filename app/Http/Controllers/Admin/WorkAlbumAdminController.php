<?php

namespace App\Http\Controllers\Admin;

use App\WorkAlbum;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlbumWorkStoreRequest;
use App\Http\Requests\AlbumWorkUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkAlbumAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select *
        from workalbums
        order by estado desc';
        $album=DB::select($sql);

        return view('Admin/AlbumWork/index',['album'=>$album]);
    }

    public function create(){
        return view('Admin/AlbumWork/albumwork_create');
    }

    public function store(AlbumWorkStoreRequest $request){
        $path = Storage::disk('public')->put('AlbumPhotos',$request->file('archivo'));
        $estado=1;
        $post = WorkAlbum::create([
            'titulo'=>$request['titulo'],
            'archivo'=>$path,
            'titulov'=>$request['titulov'],
            'link'=>$request['link'],
            'descripcion'=>$request['descripcion'],
            'estado'=>$estado,
            'cordenada'=>$request['cordenada']
        ]);
        return redirect('AlbumWork/Admin')
            ->with('info','Registro exitoso');
    }
    public function show($id)
    {
        DB::select('call  PRIORIDAD_ALBUMWORK (?)',array($id));
        return redirect('AlbumWork/Admin')->with('info','Actualizacion exitosa');
    }
    public function edit($id)
    {
        $data = DB::table('workalbums')
            ->select(DB::raw('id_workalbum,titulo,archivo as ar,titulov,link,descripcion,cordenada'))
            ->where(['id_workalbum'=>$id])
            ->get();
        return view('Admin/AlbumWork/albumwork_update', compact('data'));
    }

    public function update(AlbumWorkUpdateRequest $request,$id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('AlbumPhotos',$request->file('archivo'));
            $post = DB::table('workalbums')
                ->where('id_workalbum',$id)
                ->update(['titulo'=>$request->titulo,'archivo'=>$path,'titulov'=>$request->titulov,'link'=>$request->link,'descripcion'=>$request->descripcion,'cordenada'=>$request->cordenada]);
        }else{
            $post = DB::table('workalbums')
                ->where('id_workalbum',$id)
                ->update(['titulo'=>$request->titulo,'titulov'=>$request->titulov,'link'=>$request->link,'descripcion'=>$request->descripcion,'cordenada'=>$request->cordenada]);
        }

        return redirect('AlbumWork/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)

    {
        DB::table('workalbums')
            ->where('id_workalbum',$id)->delete();
        return redirect('AlbumWork/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
