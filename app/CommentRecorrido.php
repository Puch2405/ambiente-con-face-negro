<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRecorrido extends Model
{
    protected $table='commentrecorridos';
    protected $primaryley='id_commentrecorrido';
    protected $fillable=['descripcion','id_usuario','id_recorrido'];
    public $timestamps= false;
}
