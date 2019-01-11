<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table='photos';
    protected $primarykey='id_photo';
    protected $fillable=['titulo','descripcion','archivo','id_album','estado'];
    public $timestamps = false;
}
