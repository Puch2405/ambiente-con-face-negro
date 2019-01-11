<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPhoto extends Model
{
    protected $table='commentphotos';
    protected $primarykey='id_commentphoto';
    protected $fillable=['descripcion','id_usuario','id_album'];
    public $timestamps= false;
}
