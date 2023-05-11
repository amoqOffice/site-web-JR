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
    | Accueil Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'accueil'], function () {
        Route::get('index', 'AccueilController@index')->name('back.accueil.index'); // Liste des accueils
    });

    /*
    |--------------------------------------------------------------------------
    | Redaction Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'redaction'], function () {
        Route::get('index', 'RedactionController@index')->name('back.redaction.index'); // Liste des redactions

        Route::get('create', 'RedactionController@create')->name('back.redaction.create'); // Formulaire de création de redaction
        Route::post('store', 'RedactionController@store')->name('back.redaction.store'); // Enrégistrement de redaction

        Route::get('{id}/show', 'RedactionController@show')->name('back.redaction.show'); //Informations sur redaction

        Route::get('{id}/edit', 'RedactionController@edit')->name('back.redaction.edit'); //Formulaire d'édition de redaction
        Route::post('{id}/update', 'RedactionController@update')->name('back.redaction.update'); // Enregistrement des modification de redaction

        Route::post('destroy', 'RedactionController@destroy')->name('back.redaction.destroy'); // Suppression de redaction
        Route::post('destroyAll', 'RedactionController@destroyAll')->name('back.redaction.destroyAll'); // Suppression de plusieurs redactions
    });
});




