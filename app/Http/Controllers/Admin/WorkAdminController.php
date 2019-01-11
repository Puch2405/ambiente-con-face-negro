<?php

namespace App\Http\Controllers\Admin;

use App\Work;
use App\WorkAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WorkStoreRequest;
use App\Http\Requests\WorkUpdateRequest;
use App\Http\Controllers\Controller;

class WorkAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $sql='select id_work,works.archivo as archivo,workalbums.titulo as al,works.estado
        from workalbums,works 
        where works.id_workalbum=workalbums.id_workalbum order by works.estado desc;';

        $work= DB::select($sql);
        return view('Admin/Work/index',compact('work'));
    }

    public function create(){
        $albums = WorkAlbum::orderBy('titulo','ASC')
            ->pluck('titulo','id_workalbum');
        return view('Admin/Work/work_create',compact('albums'));
    }

    public function store(WorkStoreRequest $request){
        $estado=1;
        $prioridad=1;
        foreach ($request->archivos as $archivo) {
            $filename = $archivo->store('Photos');
            //$path = Storage::disk('public')->put('Photos',$request->file('archivo'));
            $post = Work::create([
                'archivo'=>$filename,
                'estado'=>$estado,
                'id_workalbum'=>$request['id_workalbum'],
                'prioridad'=>$prioridad
            ]);
        }
        return redirect('Works/Admin')
            ->with('info','Registro exitoso');
    }
    public function show($id)
    {
        DB::select('call  PRIORIDAD_TRABAJO (?)',array($id));
        return redirect('Works/Admin')->with('info','Actualizacion exitosa');
    }
    public function edit($id)
    {
        $albums = WorkAlbum::orderBy('titulo','ASC')->pluck('titulo','id_workalbum');
        $data = DB::table('works')
            ->select(DB::raw('id_work,archivo as ar,id_workalbum'))
            ->where(['id_work'=>$id])
            ->get();

        return view('Admin/Work/work_update', compact('data','albums'));
    }

    public function update(WorkUpdateRequest $request,$id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('Photos',$request->file('archivo'));
            $post = DB::table('works')
                ->where('id_work',$id)
                ->update(['archivo'=>$path,'id_workalbum'=>$request->id_workalbum]);
        }else{
            $path = Storage::disk('public')
                ->put('Photos',$request->file('archivo'));
            $post = DB::table('works')
                ->where('id_work',$id)
                ->update(['archivo'=>$path,'id_workalbum'=>$request->id_workalbum]);
        }
        return redirect('Works/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)
    {
        DB::table('works')->where('id_work',$id)->delete();
        return redirect('Works/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
