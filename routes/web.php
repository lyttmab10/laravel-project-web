<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faculty', [HomeController::class, 'faculty'])->name('faculty');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
Route::get('/admin/login', [HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/faculty', [HomeController::class, 'adminFaculty'])->name('admin.faculty');
Route::get('/admin/programs', [HomeController::class, 'adminPrograms'])->name('admin.programs');
Route::get('/admin/news', [HomeController::class, 'adminNews'])->name('admin.news');

// Faculty CRUD routes
Route::post('/admin/faculty', [HomeController::class, 'storeFaculty'])->name('admin.faculty.store');
Route::put('/admin/faculty/{id}', [HomeController::class, 'updateFaculty'])->name('admin.faculty.update');
Route::delete('/admin/faculty/{id}', [HomeController::class, 'deleteFaculty'])->name('admin.faculty.delete');

// Programs CRUD routes
Route::post('/admin/programs', [HomeController::class, 'storeProgram'])->name('admin.programs.store');
Route::put('/admin/programs/{id}', [HomeController::class, 'updateProgram'])->name('admin.programs.update');
Route::delete('/admin/programs/{id}', [HomeController::class, 'deleteProgram'])->name('admin.programs.delete');

// News CRUD routes
Route::post('/admin/news', [HomeController::class, 'storeNews'])->name('admin.news.store');
Route::put('/admin/news/{id}', [HomeController::class, 'updateNews'])->name('admin.news.update');
Route::delete('/admin/news/{id}', [HomeController::class, 'deleteNews'])->name('admin.news.delete');
