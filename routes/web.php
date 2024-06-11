<?php

// Marlina

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

/** 
 * 
 * Cette page définit les routes de l'application.
 * 
 * Les routes sont des URL qui permettent de rediriger les utilisateurs vers des pages spécifiques de l'application.
 * 
 * Par exemple, la route '/' redirige les utilisateurs vers la page d'accueil de l'application.
 * 
 * Pour chaque route, on définit une URL et une fonction qui sera exécutée lorsque l'utilisateur accède à cette URL.
 */

# home page
Route::get('/', [TaskController::class, 'getUserTasks'])->name('user.register');


# user part
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});

# task part
Route::post('add-task', [TaskController::class, 'store'])->name('task.store')->middleware('auth');
Route::get('add-task', function () {
    return view('add-task');
})->middleware('auth');
Route::get('delete-task/{id}', [TaskController::class, 'destroy'])->name('task.delete')->middleware('auth');

Route::get('task-statut/{id}/{statut}', [TaskController::class, 'statut'])->name('task.statut')->middleware('auth');



Route::get('edit-task/{id}', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth');
Route::post('update-task/{id}', [TaskController::class, 'update'])->name('task.update')->middleware('auth');
