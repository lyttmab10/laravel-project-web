<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faculty', [HomeController::class, 'faculty'])->name('faculty');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
Route::get('/curriculum', [HomeController::class, 'curriculum'])->name('curriculum');
Route::get('/laboratories', [HomeController::class, 'laboratories'])->name('laboratories');
Route::get('/faculty-research', [HomeController::class, 'facultyResearch'])->name('faculty.research');
Route::get('/student-projects', [HomeController::class, 'studentProjects'])->name('student.projects');
Route::get('/alumni', [HomeController::class, 'alumni'])->name('alumni');
Route::get('/admin/login', [HomeController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/faculty', [HomeController::class, 'adminFaculty'])->name('admin.faculty');
Route::get('/admin/programs', [HomeController::class, 'adminPrograms'])->name('admin.programs');
Route::get('/admin/news', [HomeController::class, 'adminNews'])->name('admin.news');
Route::get('/admin/curriculum', [HomeController::class, 'adminCurriculum'])->name('admin.curriculum');
Route::get('/admin/laboratories', [HomeController::class, 'adminLaboratories'])->name('admin.laboratories');
Route::get('/admin/faculty-research', [HomeController::class, 'adminFacultyResearch'])->name('admin.faculty.research');
Route::get('/admin/student-projects', [HomeController::class, 'adminStudentProjects'])->name('admin.student.projects');
Route::get('/admin/alumni', [HomeController::class, 'adminAlumni'])->name('admin.alumni');

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

// Curriculum CRUD routes  
Route::put('/admin/curriculum/{id}', [HomeController::class, 'updateCurriculum'])->name('curriculum.update');
