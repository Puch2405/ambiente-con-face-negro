<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table='works';
    protected $primarykey='id_work';
    protected $fillable=['archivo','estado','id_workalbum','prioridad'];
    public $timestamps= false;

    public function work()
    {
        return $this->belongsTo('App\WorkAlbum');
    }
}
