<?php

use App\Http\Controllers\ApprenantController;
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
Route::get('/students',[ApprenantController::class,'index'])->name('students-list');
Route::get('/students/new',[ApprenantController::class, 'create'])->name('add-new-student');
Route::post('/students/store',[ApprenantController::class, 'store'])->name('store-student');
Route::delete('/students/delete/{objet}',[ApprenantController::class, 'destroy'])->name('delete-student');
Route::get('/students/update/{objet}',[ApprenantController::class, 'edit'])->name('update-student');
Route::put('/students/updatestu/{objet}',[ApprenantController::class, 'update'])->name('updatestu-student');

Route::get('/listematiere',[\App\Http\Controllers\matiereController::class,'index'])->name('list_mat');
Route::get('/listematiere/new',[\App\Http\Controllers\matiereController::class,'create'])->name('add-new-matter');
Route::post('/listematiere/store',[\App\Http\Controllers\matiereController::class,'store'])->name('store-matter');
Route::delete('/listematiere/delete/{objet}',[\App\Http\Controllers\matiereController::class,'destroy'])->name('delete-matter');
Route::get('/listematiere/edit/{objet}',[\App\Http\Controllers\matiereController::class,'edit'])->name('edit-matter');
Route::put('/listematiere/update/{objet}',[\App\Http\Controllers\matiereController::class,'update'])->name('update-matter');
