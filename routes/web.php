<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories' , [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/categories/show/{id}' , [CategorieController::class, 'show'])->name('categorie.show');
    Route::post('/categories/create' , [CategorieController::class, 'create'])->name('categorie.create');
    Route::get('/categories/delete/{id}' , [CategorieController::class, 'delete'])->name('categorie.delete');
    Route::post('/categories/update/{id}' , [CategorieController::class, 'update'])->name('categorie.update');
// Type Etablissement

Route::get('/typeEtablissement' , [TypeEtablissementController::class, 'index'])->name('typeEtablissement.index');
    Route::get('/typeEtablissement/show/{id}' , [TypeEtablissementController::class, 'show'])->name('typeEtablissement.show');
    Route::post('/typeEtablissement/create' , [TypeEtablissementController::class, 'create'])->name('typeEtablissement.create');
    Route::get('/typeEtablissement/delete/{id}' , [TypeEtablissementController::class, 'delete'])->name('typeEtablissement.delete');
    Route::post('/typeEtablissement/update/{id}' , [TypeEtablissementController::class, 'update'])->name('typeEtablissement.update');
// Zone

Route::get('/zone' , [ZoneController::class, 'index'])->name('zone.index');
    Route::get('/zone/show/{id}' , [ZoneController::class, 'show'])->name('zone.show');
    Route::post('/zone/create' , [ZoneController::class, 'create'])->name('zone.create');
    Route::get('/zone/delete/{id}' , [ZoneController::class, 'delete'])->name('zone.delete');
    Route::post('/zone/update/{id}' , [ZoneController::class, 'update'])->name('zone.update');