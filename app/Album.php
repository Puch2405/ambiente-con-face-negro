<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table='albums';
    protected $primarykey='id_album';
    protected $fillable=['titulo','archivo','tamaño','estado'];
    public $timestamps = false;
}
