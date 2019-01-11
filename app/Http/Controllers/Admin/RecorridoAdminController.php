<?php

namespace App\Http\Controllers\Admin;

use App\WorkAlbum;
use App\RecorridoVirtual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RecorridoStoreRequest;
use App\Http\Requests\RecorridoUpdateRequest;
use App\Http\Controllers\Controller;

class RecorridoAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select id_recorridovirtual,recorridovirtuals.archivo as archivo,if(recorridovirtuals.tipo_content = "1", "Imagen", "Video") as tipo_content,recorridovirtuals.tipo_content as tipo,workalbums.titulo as proyecto 
        from workalbums,recorridovirtuals 
        where recorridovirtuals.id_workalbum=workalbums.id_workalbum;';

        $recorrido= DB::select($sql);
        return view('Admin/Recorrido/index',compact('recorrido'));
    }

    public function create(){
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        return view('Admin/Recorrido/recorrido_create',compact('albums'));
    }

    public function store(RecorridoStoreRequest $request){
        $estado=1;
        $tipo_content=1;
        $post = RecorridoVirtual::create([
            'archivo'=>$request['link'],
            'estado'=>$estado,
            'tipo_content'=>$tipo_content,
            'id_workalbum'=>$request['id_workalbum']
        ]);
        return redirect('Recorridos/Admin')
            ->with('info','Registro exitoso');
    }
    /*public function show($id)
    {
        dd($id);
    }*/
    public function edit($id)
    {
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        $data = DB::table('recorridovirtuals')
            ->select(DB::raw('id_recorridovirtual,archivo as link,id_workalbum'))
            ->where(['id_recorridovirtual'=>$id])
            ->get();

        return view('Admin/Recorrido/recorrido_update', compact('data','albums'));
    }

    public function update(RecorridoUpdateRequest $request,$id)
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
