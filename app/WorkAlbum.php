<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkAlbum extends Model
{
    protected $table='workalbums';
    protected $primarykey='id_workalbum';
    protected $fillable=['titulo','archivo','titulov','link','descripcion','estado','cordenada','infografia'];
    public $timestamps= false;
}
