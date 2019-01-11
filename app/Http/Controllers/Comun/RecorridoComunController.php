<?php

namespace App\Http\Controllers\Comun;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecorridoComunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select recorridoalbums.id_recorridoalbum,recorridoalbums.titulo,recorridoalbums.descripcion,recorridoalbums.archivo as ar
        from recorridoalbums
        order by estado desc';

        $albums=DB::select($sql);
        return view('Comun/Recorrido/index', compact('albums'));
    }
    public function create()
    {

    }

    public function store(WorkStoreRequest $request)
    {

    }

    public function show($id)
    {
        dd($id);
    }

    public function edit($id)
    {

    }

    public function update(WorkUpdateRequest $request,$id)
    {

    }

    public function destroy($id)
    {

    }
}
