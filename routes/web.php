<?php

use App\Http\Controllers\homeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\infoController;
use App\Http\Controllers\loginProfileController;
use App\Http\Controllers\profilesController;
use App\Http\Controllers\PublicationController;
use App\Models\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [homeController::class,'index'])->name('home.index');

// Controller Profile Start
route::name('profiles.')->prefix('profiles')->group(function () {
    Route::controller(profilesController::class)->group(function () {
        Route::get('/' ,'index')->name('index')->middleware('auth');
        Route::get('/{profile:id}' ,'show')->name('show')
        ->where('profile','\d+');
        Route::get('/create' ,'create')->name('create');
        Route::post('/' ,'store')->name('store');
        Route::delete('/{profile:id}' ,'destroy')->name('destroy')
        ->where('profile','\d+');
        Route::get('/{profile:id}/edit' ,'edit' )->name('edit')
        ->where('profile','\d+');
        Route::put('/{profile:id}' ,'update')->name('update')
        ->where('profile','\d+');
    });
});

Route::name('publication.')->prefix('publication')->group(function () {
    Route::controller(PublicationController::class)->group(function () {
        Route::get('/' ,'index')->name('index');
        Route::get('/create' ,'create')->name('create');
        Route::post('/','store')->name('store');
        Route::delete('/{publication:id}','destroy')->name('destroy')
        ->where('publication','\d+');
        Route::get('/{publication:id}' ,'show')->name('show')
        ->where('publication','\d+');
        Route::get('/edit/{publication:id}','edit')->name('edit')
        ->where('publication','\d+');
        Route::put('/{publication:id}','update')->name('update')
        ->where('publication','\d+');
    });
});

Route::name('login.')->prefix('login')->group(function(){
    Route::controller(loginProfileController::class)->group(function () {
        Route::get('/','index')->name('index')->middleware('guest');
        Route::post('/','store')->name('store')->middleware('guest');
        Route::get('/delete','delete')->name('delete');
    });
});

// Controller Profile End






// Route::get('/test/', function() {
//     $name = "ayoub";
//     $title = "test page" ;
//     $cours = [ 'php', 'html' ,'css' , 'js' , 'react' ];
//     return view('test' ,[
//         'name' => $name,
//         'title' => $title ,
//         'cours' => $cours ,
//     ]);
// } );

// Route::get('/test1/{nom}/{prenom}', function($nom , $prenom) {
//     return view('test1' ,[
//         'nom' => $nom,
//         'prenom' => $prenom ,
//     ]);
// } );

// Route::get('/test1/{nom}/{prenom}', function(Request $request) {
//     return view('test1' ,[
//         'nom' => $request->nom,
//         'prenom' => $request->prenom,
//     ]);
// } );
