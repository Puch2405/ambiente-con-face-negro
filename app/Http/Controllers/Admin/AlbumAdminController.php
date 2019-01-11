<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Requests\AlbumPhotoStoreRequest;
use App\Http\Requests\AlbumPhotoUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select albums.id_album,albums.Titulo,albums.archivo,albums.estado
        from albums
        order by estado desc';
        $album=DB::select($sql);

        return view("Admin/AlbumPhoto/index",['album'=>$album]);
    }

    public function create()
    {
        return view("Admin/AlbumPhoto/albumphoto_create");
    }

    public function store(AlbumPhotoStoreRequest $request)
    {
        $path = Storage::disk('public')->put('AlbumPhotos',$request->file('archivo'));
        $estado=1;
        $post = Album::create([
           'titulo'=>$request['Titulo'],
           'archivo'=>$path,
           'estado'=>$estado
        ]);
        return redirect('AlbumPhoto/Admin')
            ->with('info','Registro exitoso');
    }
    public function show($id)
    {
        DB::select('call  PRIORIDAD_ALBUM (?)',array($id));
        return redirect('AlbumPhoto/Admin')->with('info','Actualizacion exitosa');
    }
    public function edit($id)
    {
        $data = DB::table('albums')
            ->select(DB::raw('id_album,Titulo,archivo as ar'))
            ->where(['id_album'=>$id])
            ->get();
        return view('Admin/AlbumPhoto/albumphoto_update', compact('data'));
    }

    public function update(AlbumPhotoUpdateRequest $request, $id)
    {
        if($request->file('archivo')){
            $path = Storage::disk('public')
                ->put('AlbumPhotos',$request->file('archivo'));
            $post = DB::table('albums')
                ->where('id_album',$id)
                ->update(['titulo'=>$request->Titulo,'archivo'=>$path]);
        }else{
            $post = DB::table('albums')
                ->where('id_album',$id)
                ->update(['titulo'=>$request->Titulo]);
        }
        return redirect('AlbumPhoto/Admin')
            ->with('info','Registro actualizado con exito');
    }

    public function destroy($id)
    {
        DB::table('albums')
            ->where('id_album',$id)->delete();
        return redirect('AlbumPhoto/Admin')
            ->with('info','Registro eliminado con exito');
    }
}
