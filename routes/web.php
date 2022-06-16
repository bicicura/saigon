<?php

use Illuminate\Support\Facades\Route;
use App\Models\Casting;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\ActorController;

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

// Para redirigir a un lenguage predeterminado
Route::redirect('/', '/es');
Route::redirect('/login', '/es/login');

Route::group(['prefix' => '{language}'], function () {
    
    // para que en el castin player los castings de seccion COMERCIALES redirijan al index al apretar la cruz.
    Route::redirect('/comerciales', '/');

    Route::get('/', function () {  return view('index', ['seccion' => "Comerciales"]); })->name('index');

    Route::get('/street-agency', function () { return view('street', ['seccion' => "Street Agency"]);})->name('street agency');

    Route::get('/management', [ActorController::class, 'index'])->name('management');
    Route::get('/management/{id}', [ActorController::class, 'detail'])->name('management.detail');

    Route::get('/castings-fotografia', function () {
        $castings = Casting::where('seccion', 'Fotografía')->get();
        return view('fotografia', ['castings' => $castings]);
    })->name('castings-fotografia');

    Route::get('/mini', function () { return view('mini', ['seccion' => "Mini"]); })->name('mini');

    Route::get('/ficcion', function () { return view('ficcion', ['seccion' => 'Ficción']); })->name('ficcion');

    Route::get('/casting-player/{id}', function ($language, $id) {
        $casting = Casting::find($id);
        return view('casting-player', ['casting' => $casting]);
    })->name('casting-player');
    
    // ======================
    // PANEL DE ADMINISTRADOR 
    // ======================

    // Inicio
    Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

    // Castings
    Route::get('/dashboard/castings', [CastingController::class, 'showAll'])->middleware(['auth'])->name('castings');
    Route::get('/dashboard/create', [CastingController::class, 'create'])->middleware(['auth'])->name('dashboard.create');
    Route::get('/castings/edit/{id}', [CastingController::class, 'edit'])->middleware(['auth'])->name('castings.edit');
    Route::get('/fotografias/edit/{id}', [CastingController::class, 'editarFotografias'])->middleware(['auth'])->name('castings.edit');

    // Inbox
    Route::get('/dashboard/inbox', [ProfileController::class, 'showAll'])->middleware(['auth'])->name('dashboard.inbox');
    Route::get('/dashboard/inbox/{id}', [ProfileController::class, 'show'])->middleware(['auth'])->name('dashboard.inbox-detail');

    // Management
    Route::get('dashboard/management', [ActorController::class, 'showAll'])->middleware(['auth'])->name('dashboard.management');
    Route::get('/dashboard/management/create', [ActorController::class, 'create'])->middleware(['auth'])->name('dashboard.management-create');
    Route::get('/dashboard/management/edit/{id}', [ActorController::class, 'edit'])->middleware(['auth'])->name('dashboard.management-edit');
    Route::get('/dashboard/management/edit/book/{id}', [ActorController::class, 'editBook'])->middleware(['auth'])->name('dashboard.management-edit-book');

    Route::get('/test', function () {
        $castings = Casting::where('seccion', 'Castings Comerciales')->get();
        return view('test', ['castings' => $castings]);
    });

});


require __DIR__.'/auth.php';


