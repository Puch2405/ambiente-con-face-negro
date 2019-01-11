<?php

namespace App\Http\Controllers\Comun;

use App\Http\Requests\ComentAlbumUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ComentAlbumStoreRequest;
use App\Http\Requests\ComentAlbumUpdateRequestRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\CommentPhoto;
use App\Photo;

class ComentAlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ComentAlbumStoreRequest $request){
        //dd($request);
        $post = CommentPhoto::create([
            'descripcion'=>$request['descripcion'],
            'id_usuario'=>$request['id_usuario'],
            'id_album'=>$request['id_album'],
        ]);
        return redirect('Fotos/Comun/'.$request->id_album)
            ->with('info','Comentario exitoso');
    }

    public function edit($id)
    {
        $sqlalbum= 'select commentphotos.id_album
        from commentphotos
        where id_commentphoto='.$id;
        $album =  DB::select($sqlalbum);
        $data= json_decode( json_encode($album), true);
        $resalbum=$data[0]['id_album'];

        $sql= 'select commentphotos.id_commentphoto,commentphotos.descripcion,users.name,commentphotos.id_album,id_usuario
        from commentphotos,users
        where commentphotos.id_usuario=users.id and id_album='.$resalbum;
        $coments =  DB::select($sql);

        $data = DB::table('commentphotos')
            ->select(DB::raw('id_commentphoto,descripcion,id_usuario,id_album'))
            ->where(['id_commentphoto'=>$id])
            ->get();

        $sql2='select photos.id_photo,photos.titulo,photos.descripcion,photos.archivo,photos.id_album,photos.estado
        from photos
        where  photos.id_album='.$resalbum;

        $pho= DB::select($sql2);

        return view('Comun/Photo/photo_edit',compact('pho','id','coments','resalbum','data'));

    }

    public function update(ComentAlbumUpdateRequest $request,$id)
    {
        $post = DB::table('commentphotos')
             ->where('id_commentphoto',$id)
             ->update(['descripcion'=>$request->descripcion]);

        return redirect('Fotos/Comun/'.$request->id_album)
            ->with('info','Comentario Actualizado');
    }

    public function destroy($id)
    {
        DB::table('commentphotos')->where('id_commentphoto',$id)->delete();
        return back()
            ->with('info','Comentario eliminado con exito');
    }
}
