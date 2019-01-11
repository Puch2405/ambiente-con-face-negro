<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentWork extends Model
{
    protected $table='commentworks';
    protected $primarykey='id_commentwork';
    protected $fillable=['descripcion','id_usuario','id_workalbum'];
    public $timestamps= false;
}
