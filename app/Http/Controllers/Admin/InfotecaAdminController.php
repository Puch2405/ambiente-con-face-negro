<?php

namespace App\Http\Controllers\Admin;

use App\Infoteca;
use App\WorkAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\InfotecaStoreRequest;
use App\Http\Requests\InfotecaUpdateRequest;
use App\Http\Controllers\Controller;

class InfotecaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select id_infoteca,infotecas.titulo,infotecas.archivo,workalbums.titulo as tituloal 
        from workalbums,infotecas 
        where infotecas.id_workalbum=workalbums.id_workalbum;';

        $infoteca= DB::select($sql);
        return view('Admin/Infoteca/index',compact('infoteca'));
    }

    public function create(){
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        return view('Admin/Infoteca/infoteca_create',compact('albums'));
    }

    public function store(InfotecaStoreRequest $request){
        $path =  Storage::disk('public')->put('InfografiaPdf',$request->file('archivo'));
        $post = Infoteca::create([
            'titulo'=>$request['titulo'],
            'archivo'=>$path,
            'id_workalbum'=>$request['id_workalbum']
        ]);
        return redirect('Infoteca/Admin')
            ->with('info','Registro exitoso');
    }
   /* public function show($id)
    {
       // dd($id);
    }*/
    public function edit($id)
    {
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        $data = DB::table('infotecas')
            ->select(DB::raw('id_infoteca,titulo,archivo as ar,id_workalbum'))
            ->where(['id_infoteca'=>$id])
            ->get();

        return view('Admin/Infoteca/infoteca_update', compact('data','albums'));
    }

    public function update(InfotecaUpdateRequest $request,$id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('InfografiaPdf',$request->file('archivo'));
            $post = DB::table('infotecas')
                ->where('id_infoteca',$id)
                ->update(['titulo'=>$request->titulo,'archivo'=>$path,'id_workalbum'=>$request->id_workalbum]);
        }else{
            $post = DB::table('infotecas')
                ->where('id_infoteca',$id)
                ->update(['titulo'=>$request->titulo,'id_workalbum'=>$request->id_workalbum]);
        }
        return redirect('Infoteca/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)
    {
        DB::table('infotecas')->where('id_infoteca',$id)->delete();
        return redirect('Infoteca/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
