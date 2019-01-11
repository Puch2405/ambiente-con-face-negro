<?php

namespace App\Http\Controllers\Comun;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Work;

class WorkComunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sql='select workalbums.id_workalbum,workalbums.titulo,workalbums.archivo as ar
        from workalbums
        order by estado desc';

        $albums = DB::select($sql);
        return view('Comun/Work/index', compact('albums'));
    }

    public function show($id)
    {
        $sql= 'select commentworks.id_commentwork,commentworks.descripcion,users.name,commentworks.id_workalbum,id_usuario
        from commentworks,users
        where commentworks.id_usuario=users.id and id_workalbum='.$id;
        $coments =  DB::select($sql);

        $sql2='select link,descripcion
        from workalbums
        where  workalbums.id_workalbum='.$id;
        $album=DB::select($sql2);

        $sql3='select id_workalbum,cordenada,titulov as titulo from workalbums where id_workalbum='.$id;
        $corde = DB::select($sql3);

        $sql4='select archivo 
        from works
        where id_workalbum='.$id;
        $rutasIm = Work::inRandomOrder()->where('id_workalbum',$id)->get();

        $sql5='select archivo,tipo_content 
        from recorridovirtuals 
        where id_workalbum='.$id;
        $content = DB::select($sql5);

        $sql6='select if(isnull( (select id_workalbum 
        from workalbums 
        where id_workalbum > '.$id.' ORDER BY id_workalbum asc LIMIT 1)),0,
        (select id_workalbum 
        from workalbums 
        where id_workalbum > '.$id.' ORDER BY id_workalbum asc LIMIT 1)) as mayor,if(isnull((
        select id_workalbum 
        from workalbums 
        where id_workalbum < '.$id.' ORDER BY id_workalbum desc LIMIT 1)),0,(
        select id_workalbum 
        from workalbums 
        where id_workalbum < '.$id.' ORDER BY id_workalbum desc LIMIT 1)) as menor';
        $proyectos= DB::select($sql6);
        $data= json_decode( json_encode($proyectos), true);
        $img1=$data[0]['mayor'];
        $img2=$data[0]['menor'];

        $sql7='select (select archivo from workalbums where id_workalbum='.$img2.') as imgMenor,
        (select titulo from workalbums where id_workalbum='.$img2.') as titMenor,
        (select archivo from workalbums where id_workalbum='.$img1.') as imgMayor,
        (select titulo from workalbums where id_workalbum='.$img1.') as titMayor';
        $img = DB::select($sql7);

        $sql8='select id_infoteca,titulo,archivo 
        from infotecas 
        where id_workalbum='.$id;
        $info = DB::select($sql8);

        return view('Comun/Work/work_show',compact('album','coments','corde','id','rutasIm','content','proyectos','img','info'));
    }

}
