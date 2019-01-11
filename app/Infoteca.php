<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infoteca extends Model
{
    protected $table='infotecas';
    protected $primarykey='id_infoteca';
    protected $fillable=['titulo','archivo','id_workalbum'];
    public $timestamps= false;
}
