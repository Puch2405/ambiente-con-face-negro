<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentVideo extends Model
{
    protected $table='commentvideos';
    protected $primarykey='id_commentvideo';
    protected $fillable=['descripcion','id_usuario','id_video'];
    public $timestamps= false;
}
