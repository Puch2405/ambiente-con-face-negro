<?php

namespace App\Http\Controllers\Comun;

use App\Photo;
use App\Work;
use App\CommentPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoComunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select archivo
        from works
        order by estado desc';
        $albums = Work::inRandomOrder()->get();
        return view('Comun/Photo/index', compact('albums'));
    }
    /*public function show($id)
    {
        $sql= 'select commentphotos.id_commentphoto,commentphotos.descripcion,users.name,commentphotos.id_album,id_usuario
        from commentphotos,users
        where commentphotos.id_usuario=users.id and id_album='.$id;
        $coments =  DB::select($sql);

        $sql2='select photos.id_photo,photos.titulo,photos.descripcion,photos.archivo,photos.id_album,photos.estado
        from photos
        where  photos.id_album='.$id;

        $pho=DB::select($sql2);
        return view('Comun/Photo/photo_show',compact('pho','id','coments'));
    }*/
}
