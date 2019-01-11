<?php

namespace App\Http\Controllers\Admin;

use App\RecorridoAlbum;
use App\WorkAlbum;
use App\RecorridoVirtual;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AlbumRecorridoStoreRequest;
use App\Http\Requests\AlbumRecorridoUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecorridoAlbumAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   /* public function index()
    {
        $sql='select recorridoalbums.id_recorridoalbum,recorridoalbums.titulo,recorridoalbums.descripcion,recorridoalbums.archivo,recorridoalbums.estado
        from recorridoalbums
        order by estado desc';

        $recorridoalbum=DB::select($sql);

        return view('Admin/AlbumRecorrido/index',['recorridoalbum'=>$recorridoalbum]);
    }*/

    public function create(){
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        return view('Admin/AlbumRecorrido/albumrecorrido_create',compact('albums'));
    }

    public function store(AlbumRecorridoStoreRequest $request){
        $estado=1;
        $tipo_content=2;
        $post = RecorridoVirtual::create([
            'archivo'=>$request['link'],
            'estado'=>$estado,
            'tipo_content'=>$tipo_content,
            'id_workalbum'=>$request['id_workalbum']
        ]);
        return redirect('Recorridos/Admin')
            ->with('info','Registro exitoso');
    }
   /* public function show($id)
    {
        DB::select('call  PRIORIDAD_ALBUMRECORRIDO (?)',array($id));
        return redirect('AlbumRecorrido/Admin')->with('info','Actualizacion exitosa');
    }*/
    public function edit($id)
    {
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        $data = DB::table('recorridovirtuals')
            ->select(DB::raw('id_recorridovirtual,archivo as link,id_workalbum'))
            ->where(['id_recorridovirtual'=>$id])
            ->get();
        return view('Admin/AlbumRecorrido/albumrecorrido_update', compact('data','albums'));
    }

    public function update(AlbumRecorridoUpdateRequest $request,$id)
    {
        $post = DB::table('recorridovirtuals')
            ->where('id_recorridovirtual',$id)
            ->update(['archivo'=>$request->link,'id_workalbum'=>$request->id_workalbum]);

        return redirect('Recorridos/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)

    {
        DB::table('recorridovirtuals')->where('id_recorridovirtual',$id)->delete();
        return redirect('Recorridos/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
