<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function show($id)
    {
        $sql='select archivo from infotecas where id_infoteca='.$id;
        $sqlfile = DB::select($sql);
        $f=json_decode( json_encode($sqlfile), true);
        $fi=$f[0]['archivo'];
        $Archivo = public_path().'/'.$fi;
        return response()->download($Archivo);
    }
}
