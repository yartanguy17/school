<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\TypeEtablissementController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LoginController;
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

Route::get('/' , [LoginController::class , 'index']);
Route::get("/erreur-d'accés" , [LoginController::class , 'error']);
Route::post('admin/connexion/perform' , [LoginController::class , 'login'])->name('admin.connexion.perform');



Route::name('admin.')->prefix('admin')->middleware('CheckLoginMiddleware')->group( function () {

    Route::get('/dashboard', [LoginController::class , 'dashboard'])->name('dashboard');

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
// Etablissement

Route::get('/etablissement' , [EtablissementController::class, 'index'])->name('etablissement.index');
    Route::get('/etablissement/show/{id}' , [EtablissementController::class, 'show'])->name('etablissement.show');
    Route::post('/etablissement/create' , [EtablissementController::class, 'create'])->name('etablissement.create');
    Route::get('/etablissement/delete/{id}' , [EtablissementController::class, 'delete'])->name('etablissement.delete');
    Route::post('/etablissement/update/{id}' , [EtablissementController::class, 'update'])->name('etablissement.update');
// Filiere

Route::get('/filiere' , [FiliereController::class, 'index'])->name('filiere.index');
    Route::get('/filiere/show/{id}' , [FiliereController::class, 'show'])->name('filiere.show');
    Route::post('/filiere/create' , [FiliereController::class, 'create'])->name('filiere.create');
    Route::get('/filiere/delete/{id}' , [FiliereController::class, 'delete'])->name('filiere.delete');
    Route::post('/filiere/update/{id}' , [FiliereController::class, 'update'])->name('filiere.update');

//Annee scolaire
Route::get('/annnee-scolaire' , [AnneeScolaireController::class , 'index'])->name('anneeScolaire.index');
    Route::get('/annee-scolaire/show/{id}' , [AnneeScolaireController::class , 'show'])->name('anneeScolaire.show');
    Route::post('/annee-scolaire/create' , [AnneeScolaireController::class , 'create'])->name('anneeScolaire.create');
    Route::get('/annee-scolaire/delete/{id}' , [AnneeScolaireController::class , 'delete'])->name('anneeScolaire.delete');
    Route::post('/annee-scolaire/update/{id}' , [AnneeScolaireController::class , 'update'])->name('anneeScolaire.update');

//Annee scolaire
Route::get('/classe' , [ClasseController::class , 'index'])->name('classe.index');
    Route::get('/classe/show/{id}' , [ClasseController::class , 'show'])->name('classe.show');
    Route::post('/classe/create' , [ClasseController::class , 'create'])->name('classe.create');
    Route::get('/classe/delete/{id}' , [ClasseController::class , 'delete'])->name('classe.delete');
    Route::post('/classe/update/{id}' , [ClasseController::class , 'update'])->name('classe.update');

//etudiants
Route::get('/etudiant' , [EtudiantController::class , 'index'])->name('etudiant.index');
    Route::get('/etudiant/show/{id}' , [EtudiantController::class , 'show'])->name('etudiant.show');
    Route::post('/etudiant/create' , [EtudiantController::class , 'create'])->name('etudiant.create');
    Route::get('/etudiant/delete/{id}' , [EtudiantController::class , 'delete'])->name('etudiant.delete');
    Route::post('/etudiant/update/{id}' , [EtudiantController::class , 'update'])->name('etudiant.update');

//Inscription
Route::get('/inscription' , [InscriptionController::class , 'index'])->name('inscription.index');
    Route::get('/inscription/show/{id}' , [InscriptionController::class , 'show'])->name('inscription.show');
    Route::post('/inscription/create' , [InscriptionController::class , 'create'])->name('inscription.create');
    Route::get('/inscription/delete/{id}' , [InscriptionController::class , 'delete'])->name('inscription.delete');
    Route::post('/inscription/update/{id}' , [InscriptionController::class , 'update'])->name('inscription.update');

Route::get('/deconnexion' , [LoginController::class , 'logout']);
});
