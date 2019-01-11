<?php

namespace App\Http\Controllers\Comun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;

class ChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create(){
        return view('Comun/Change/change_create');
    }

    public function store(ChangeStoreRequest $request){
        $urli="https://acrvalle.com/";
        $path = Storage::disk('public')->put('ProfilePhotos',$request->file('archivo'));
        $CompletePath=$urli.$path;
        $post = DB::table('users')
            ->where('id',$request->id_usuario)
            ->update(['avatar'=>$CompletePath]);
        return back()
            ->with('info','Foto de Perfil Cambiada con Exito');
    }

    public function edit($id)
    {


    }

    public function update(ComentWorkUpdateRequest $request,$id)
    {

    }
}
