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

Route::get('/listematiere',[\App\Http\Controllers\matiereController::class,'index']);
