<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecorridoVirtual extends Model
{
    protected $table='recorridovirtuals';
    protected $primarykey='id_recorridovirtual';
    protected $fillable=['archivo','estado','tipo_content','id_workalbum'];
    public $timestamps= false;
}
