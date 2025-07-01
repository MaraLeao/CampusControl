<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('students.index'); // rota raiz lista estudantes

Route::get('/students', [StudentController::class, 'index']); // rota /students lista estudantes também

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store']);

Route::get('/students/inativos', [StudentController::class, 'inactive'])->name('students.inactive');

Route::get('/students/{id}', [StudentController::class, 'show']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::post('/students/{id}/activate', [StudentController::class, 'activate']);
