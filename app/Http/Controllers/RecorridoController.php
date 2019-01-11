<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecorridoController extends Controller
{
    public function index()
    {
        $sql='select recorridoalbums.id_recorridoalbum,recorridoalbums.titulo,recorridoalbums.descripcion,recorridoalbums.archivo as ar
        from recorridoalbums
        order by estado desc';

        $albums=DB::select($sql);

        return view('Recorridos/index', compact('albums'));
    }
    public function show($id)
    {
        dd("Llegue al controler");
    }
}
