<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Album;
use App\Http\Requests\PhotoStoreRequest;
use App\Http\Requests\PhotoUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //return view('Photos/photo');
        $sql='select id_photo,photos.titulo as titulo,photos.descripcion,photos.archivo as archivo,albums.Titulo as al,photos.estado 
        from albums,photos
        where photos.id_album=albums.id_album  order by estado desc;';

        $pho= DB::select($sql);
        return view('Admin/Photo/index', compact('pho'));
    }

    public function create(){
        $albums = Album::orderBy('Titulo','ASC')
            ->pluck('Titulo','id_album');
        return view('Admin/Photo/photo_create',compact('albums'));
    }

    public function store(PhotoStoreRequest $request){
        $estado=1;
        $path = Storage::disk('public')->put('Photos',$request->file('archivo'));
        $post = Photo::create([
            'titulo'=>$request['titulo'],
            'descripcion'=>$request['descripcion'],
            'archivo'=>$path,
            'id_album'=>$request['id_album'],
            'estado'=>$estado
        ]);
        return redirect('Photos/Admin')
            ->with('info','Registro exitoso');
    }
    public function show($id)
    {
        DB::select('call  PRIORIDAD_FOTO (?)',array($id));
        return redirect('Photos/Admin')->with('info','Actualizacion exitosa');dd($id);
    }
    public function edit($id)
    {
        $albums = Album::orderBy('Titulo','ASC')->pluck('Titulo','id_album');
        $data = DB::table('photos')
            ->select(DB::raw('id_photo,titulo,descripcion,archivo as ar,id_album'))
            ->where(['id_photo'=>$id])
            ->get();

        return view('Admin/Photo/photo_update', compact('data','albums'));
    }

    public function update(PhotoUpdateRequest $request,$id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('Photos',$request->file('archivo'));
            $post = DB::table('photos')
                ->where('id_photo',$id)
                ->update(['titulo'=>$request->titulo,'descripcion'=>$request->descripcion,'archivo'=>$path,'id_album'=>$request->id_album]);
        }else{
            $post = DB::table('photos')
                ->where('id_photo',$id)
                ->update(['titulo'=>$request->titulo,'descripcion'=>$request->descripcion,'id_album'=>$request->id_album]);
        }
        return redirect('Photos/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)
    {
        DB::table('photos')->where('id_photo',$id)->delete();
        return redirect('Photos/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
