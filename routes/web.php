<?php

use App\Models\ProjectUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ProjectUserController;

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
Route::resource('users',UserController::class);

Route::middleware(['auth', 'verified'])->group(function () {

//Route home :

Route::get('home',[HomeController::class, 'index'])->name('home');

Route::resource('project-user', ProjectUserController::class);

Route::post('collaborate/{user}', [ProjectUserController::class, 'collaborate'])->name('collaborate');

//Route Admin

Route::middleware('admin')->group(function () {

// Route users:


//Route projects :
Route::resource('projects',ProjectController::class);

//Route partenaire:
Route::resource('partenaires',PartenaireController::class);

//Route project-user
Route::get('project-user',[ProjectUserController::class, 'show'])->name('project-user');

// assign project route 
Route::post('assign-users/{project}', [ProjectUserController::class, 'store'])->name('assign.users');

Route::get('/dashboard', [UserController::class , 'allusers'])->name('dashboard');

 });

});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
