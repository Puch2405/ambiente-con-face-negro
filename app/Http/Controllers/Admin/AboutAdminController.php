<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\AboutStoreRequest;
use App\Http\Requests\AboutUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class AboutAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $abouts = DB::table('abouts')
            ->select(DB::raw('id_about,nombre,descripcion,archivo as ar'))
            ->get();
        return view('Admin/About/index', compact('abouts'));
    }

    public function create(){
        return view('Admin/About/about_create');
    }

    public function store(AboutStoreRequest $request){
        $path = Storage::disk('public')->put('AboutPhotos',$request->file('archivo'));
        $post = About::create([
            'nombre'=>$request['nombre'],
            'descripcion'=>$request['descripcion'],
            'archivo'=>$path
        ]);
        return redirect('Abouts/Admin')
            ->with('info','Registro exitoso');
    }
    public function show($id)
    {
        dd($id);
    }
   public function edit($id)
    {
        ///regreses un formilario con los datos de el elemnto
        $data = DB::table('abouts')
            ->select(DB::raw('id_about,nombre,descripcion,archivo as ar'))
            ->where(['id_about'=>$id])
            ->get();

        return view('Admin/About/about_update', compact('data'));
    }

    public function update(AboutUpdateRequest $request,$id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('AboutPhotos',$request->file('archivo'));
            $post = DB::table('abouts')
                ->where('id_about',$id)
                ->update(['nombre'=>$request->nombre,'descripcion'=>$request->descripcion,'archivo'=>$path]);
        }else{
            $post = DB::table('abouts')
                ->where('id_about',$id)
                ->update(['nombre'=>$request->nombre,'descripcion'=>$request->descripcion]);
        }
        return redirect('Abouts/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)

    {
        DB::table('abouts')
            ->where('id_about',$id)->delete();
        return redirect('Abouts/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
