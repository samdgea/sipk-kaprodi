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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified']], function () {
   Route::get('/dashboard', \App\Http\Livewire\DashboardLivewire::class)->name('dashboard');
   Route::get('/mahasiswa', \App\Http\Livewire\MahasiswaLivewire::class)->name('mahasiswa');
   Route::get('/dosen', \App\Http\Livewire\DosenLivewire::class)->name('dosen');

   Route::group(['prefix' => 'manage', 'middleware' => []], function () {
       Route::get('/academic-year', \App\Http\Livewire\AcademicYearLivewire::class)->name('academic-year.management');//->middleware('role:Kaprodi');
       Route::get('/generate-lkps', \App\Http\Livewire\ReportLivewire::class)->name('lkps.report');

      Route::get('/users', App\Http\Livewire\UserManagementLivewire::class)->name('user.management')->middleware('role_or_permission:Super Admin|view-user');
      Route::get('/activity-log', \App\Http\Livewire\ActivityLogLivewire::class)->name('log.management');//->middleware('role_or_permission:Super Admin|view-activity-log');
   });

});
