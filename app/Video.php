<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'videos';
    protected $primaryKey='id_video';
    protected $fillable=['titulo','link','estado'];
    public $timestamps = false;
}
