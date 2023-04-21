<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware(['auths', 'admin'])->group(function () {
//     Route::view('/', ('home'));
// });

// FRONT ONLY
Route::view('/', ('front/welcome'));

// BACKOFFICE ONLY
Route::prefix('admin')->group(function () {
    // Route::view('/', ('back/home'));
    Route::get('/', 'DashboardController@index')->name('back.home');

    /*
    |--------------------------------------------------------------------------
    | Enseignement Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'enseignement'], function () {
        Route::get('index', 'EnseignementController@index')->name('enseignement.index'); // Liste des enseignements

        Route::get('create', 'EnseignementController@create')->name('enseignement.create'); // Formulaire de création de enseignement
        Route::post('store', 'EnseignementController@store')->name('enseignement.store'); // Enrégistrement de enseignement

        Route::get('{id}/show', 'EnseignementController@show')->name('enseignement.show'); //Informations sur enseignement

        Route::get('{id}/edit', 'EnseignementController@edit')->name('enseignement.edit'); //Formulaire d'édition de enseignement
        Route::post('{id}/update', 'EnseignementController@update')->name('enseignement.update'); // Enregistrement des modification de enseignement

        Route::post('destroy', 'EnseignementController@destroy')->name('enseignement.destroy'); // Suppression de enseignement
        Route::post('destroyAll', 'EnseignementController@destroyAll')->name('enseignement.destroyAll'); // Suppression de plusieurs enseignements
    });
});
