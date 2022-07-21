<?php

use Illuminate\Support\Facades\Route;
use App\Models\Casting;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\NewsletterController;

// Route::get('/symlink', function () { return view('symlink'); });

// Para redirigir a un lenguage predeterminado.
Route::redirect('/', '/es');
Route::redirect('/login', '/es/login');

// Los controllers van a tener como 1er param $lang para saber en que idioma deben devolver la vista.
Route::group(['prefix' => '{language}'], function () {
    
    // para que en el castin player los castings de seccion COMERCIALES redirijan al index al apretar la cruz.
    // Route::redirect('/comerciales', '/#comerciales');

    Route::get('/', [CastingController::class, 'index'])->name('index');
    Route::get('/comerciales', [CastingController::class, 'comerciales'])->name('comerciales');
    Route::get('/street-agency', [CastingController::class, 'streetagency'])->name('street-agency');
    Route::get('/mini', [CastingController::class, 'mini'])->name('mini');
    Route::get('/fotografia', [CastingController::class, 'fotografia'])->name('castings-fotografia');
    Route::get('/ficcion', [CastingController::class, 'ficcion'])->name('ficcion');
    Route::get('/player/{slug}', [CastingController::class, 'player'])->name('casting-player');    

    Route::get('/management', [ActorController::class, 'index'])->name('management');
    Route::get('/management/{slug}', [ActorController::class, 'detail'])->name('management.detail');

    Route::get('/desuscribir', [NewsletterController::class, 'desuscribir'])->middleware(['auth'])->name('desuscribir');

    // Route::get('/', [CastingController::class, 'api'])->name('api');

    
    // ======================
    // PANEL DE ADMINISTRADOR 
    // ======================

    // Inicio
    Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');

    // Castings
    Route::get('/dashboard/castings', [CastingController::class, 'showAll'])->middleware(['auth'])->name('castings');
    Route::get('/dashboard/create', [CastingController::class, 'create'])->middleware(['auth'])->name('castings.create');
    Route::get('/castings/edit/{id}', [CastingController::class, 'edit'])->middleware(['auth'])->name('castings.edit');
    Route::get('/fotografias/edit/{id}', [CastingController::class, 'editarFotografias'])->middleware(['auth'])->name('castings.edit-fotografias');
    
    // Reels
    Route::get('/dashboard/reel', [CastingController::class, 'showReel'])->middleware(['auth'])->name('dashboard.reel');

    // Productoras
    Route::get('/dashboard/productoras', [CastingController::class, 'productoras'])->middleware(['auth'])->name('dashboard.productoras');
    Route::get('/dashboard/productoras/create', [CastingController::class, 'createProductora'])->middleware(['auth'])->name('dashboard.productoras-create');
    Route::get('/dashboard/productoras/edit/{id}', [CastingController::class, 'editProductora'])->middleware(['auth'])->name('dashboard.productoras-edit');

    // Inbox
    Route::get('/dashboard/inbox', [ConsultaController::class, 'showAll'])->middleware(['auth'])->name('dashboard.inbox');
    Route::get('/dashboard/inbox/{id}', [ConsultaController::class, 'show'])->middleware(['auth'])->name('dashboard.inbox-detail');

    // Newsletter
    Route::get('/dashboard/newsletter', [NewsletterController::class, 'index'])->middleware(['auth'])->name('dashboard.newsletter');

    // Management
    Route::get('dashboard/management', [ActorController::class, 'showAll'])->middleware(['auth'])->name('dashboard.management');
    Route::get('/dashboard/management/create', [ActorController::class, 'create'])->middleware(['auth'])->name('dashboard.management-create');
    Route::get('/dashboard/management/edit/{id}', [ActorController::class, 'edit'])->middleware(['auth'])->name('dashboard.management-edit');
    Route::get('/dashboard/management/edit/book/{id}', [ActorController::class, 'editBook'])->middleware(['auth'])->name('dashboard.management-edit-book');

    Route::get('/test', [CastingController::class, 'test'])->name('test');

});

require __DIR__.'/auth.php';;