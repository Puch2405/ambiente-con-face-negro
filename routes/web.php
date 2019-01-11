<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/','WorkController');

//Normally User
Route::group(['middleware' => ['guest','cors']],function(){
    Route::resource('About','AboutController');

    Route::resource('Award','AwardController');

    Route::resource('Photo','PhotoController');

    Route::resource('Video','VideoController');

    Route::resource('Work','WorkController');

    Route::resource('Pdf','PdfController');

    //Route::resource('Recorrido','RecorridoController');
});
//Admin
Route::group(['middleware' => 'useradmin'],function(){
    Route::resource('Abouts/Admin','Admin\AboutAdminController');

    Route::resource('Awards/Admin','Admin\AwardAdminController');

    Route::resource('Photos/Admin','Admin\PhotoAdminController');

    Route::resource('Videos/Admin','Admin\VideoAdminController');

    Route::resource('Works/Admin','Admin\WorkAdminController');

    Route::resource('Recorridos/Admin','Admin\RecorridoAdminController');

    //Route::resource('AlbumPhoto/Admin','Admin\AlbumAdminController');

    Route::resource('Recorrido/Admin','Admin\RecorridoAlbumAdminController');
    /*Se Modifico esta ruta para ingresar videos de 360° y se utiliza el mismo controlador de la antigua ruta*/

    Route::resource('AlbumWork/Admin','Admin\WorkAlbumAdminController');

    Route::resource('Infoteca/Admin','Admin\InfotecaAdminController');
});

//User
Route::group(['middleware' => ['usernormally','cors']],function (){
    Route::resource('Acercas/Comun','Comun\AboutComunController');

    Route::resource('Premios/Comun','Comun\PremioComunController');

    Route::resource('Fotos/Comun','Comun\PhotoComunController');

    //Route::resource('ComentAlbum/Comun','Comun\ComentAlbumController');

    Route::resource('ComentWork/Comun','Comun\ComentWorkController');

    Route::resource('Films/Comun','Comun\VideoComunController');

    Route::resource('Trabajos/Comun','Comun\WorkComunController');

    Route::resource('Pdf/Comun','PdfController');

    Route::resource('Change/Comun','Comun\ChangeController');

    //Route::resource('Tours/Comun','Comun\RecorridoComunController');

    //Route::resource('Infoteca/Comun','Comun\InfotecaComunController');
});
//
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

