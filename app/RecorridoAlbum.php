<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecorridoAlbum extends Model
{
    protected $table='recorridoalbums';
    protected $primarykey='id_recorridoalbum';
    protected $fillable=['titulo','descripcion','archivo','estado'];
    public $timestamps= false;
}
