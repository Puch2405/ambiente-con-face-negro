<?php

namespace App\Http\Controllers\Comun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComentWorkStoreRequest;
use App\Http\Requests\ComentWorkUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\CommentWork;
use App\Work;


class ComentWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ComentWorkStoreRequest $request){
        $post = CommentWork::create([
            'descripcion'=>$request['descripcion'],
            'id_usuario'=>$request['id_usuario'],
            'id_workalbum'=>$request['id_album'],
        ]);
        return redirect('Trabajos/Comun/'.$request->id_album)
            ->with('info','Comentario exitoso');
    }

    public function edit($id)
    {
        $sqlalbum= 'select commentworks.id_workalbum
        from commentworks
        where id_commentwork='.$id;
        $album =  DB::select($sqlalbum);
        $data= json_decode( json_encode($album), true);
        $resalbum=$data[0]['id_workalbum'];

        $sql= 'select commentworks.id_commentwork,commentworks.descripcion,users.name,commentworks.id_workalbum,id_usuario
        from commentworks,users
        where commentworks.id_usuario=users.id and id_workalbum='.$resalbum;
        $coments =  DB::select($sql);

        $data = DB::table('commentworks')
            ->select(DB::raw('id_commentwork,descripcion,id_usuario,id_workalbum'))
            ->where(['id_commentwork'=>$id])
            ->get();

        $sql2='select link,descripcion
        from workalbums
        where  workalbums.id_workalbum='.$resalbum;

        $work= DB::select($sql2);

        $sql3='select id_workalbum,cordenada,titulov as titulo,infografia from workalbums where id_workalbum='.$resalbum;
        $corde = DB::select($sql3);

        $sql4='select archivo 
        from works
        where id_workalbum='.$id;
        $rutasIm = Work::inRandomOrder()->where('id_workalbum',$id)->get();

        $sql5='select archivo,tipo_content 
        from recorridovirtuals 
        where id_workalbum='.$resalbum;
        $content = DB::select($sql5);

        $sql6='select if(isnull( (select id_workalbum 
        from workalbums 
        where id_workalbum > '.$resalbum.' ORDER BY id_workalbum desc LIMIT 1)),0,
        (select id_workalbum 
        from workalbums 
        where id_workalbum > '.$resalbum.' ORDER BY id_workalbum desc LIMIT 1)) as mayor,if(isnull((
        select id_workalbum 
        from workalbums 
        where id_workalbum < '.$resalbum.' ORDER BY id_workalbum desc LIMIT 1)),0,(
        select id_workalbum 
        from workalbums 
        where id_workalbum < '.$resalbum.' ORDER BY id_workalbum desc LIMIT 1)) as menor';
        $proyectos= DB::select($sql6);
        $data2= json_decode( json_encode($proyectos), true);
        $img1=$data2[0]['mayor'];
        $img2=$data2[0]['menor'];

        $sql7='select (select archivo from workalbums where id_workalbum='.$img2.') as imgMenor,
        (select titulo from workalbums where id_workalbum='.$img2.') as titMenor,
        (select archivo from workalbums where id_workalbum='.$img1.') as imgMayor,
        (select titulo from workalbums where id_workalbum='.$img1.') as titMayor';
        $img = DB::select($sql7);

        return view('Comun/Work/work_edit',compact('work','id','coments','resalbum','data','corde','rutasIm','content','proyectos','img'));

    }

    public function update(ComentWorkUpdateRequest $request,$id)
    {
        $post = DB::table('commentworks')
            ->where('id_commentwork',$id)
            ->update(['descripcion'=>$request->descripcion]);

        return redirect('Trabajos/Comun/'.$request->id_workalbum)
            ->with('info','Comentario Actualizado');
    }

    public function destroy($id)
    {
        DB::table('commentworks')->where('id_commentwork',$id)->delete();
        return back()
            ->with('info','Comentario eliminado con exito');
    }
}
