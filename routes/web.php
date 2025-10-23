<?php

use App\Http\Controllers\BlueprintController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/how', function () {
    return view('how');
})->name('how');

// blueprints
//Route::resource('blueprints', BlueprintController::class);
Route::get('/blueprints', [BlueprintController::class, 'index'])->name('blueprints.index');
Route::get('/blueprints/create', [BlueprintController::class, 'create'])
    ->middleware('auth')
    ->name('blueprints.create');
Route::post('/blueprints', [BlueprintController::class, 'store'])
    ->middleware('auth')
    ->name('blueprints.store');
Route::get('/blueprints/{blueprint}', [BlueprintController::class, 'show'])
    ->name('blueprints.show');
Route::get('/blueprints/{blueprint}/edit', [BlueprintController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'blueprint')
    ->name('blueprints.edit');
Route::put('/blueprints/{blueprint}', [BlueprintController::class, 'update'])
    ->middleware('auth')
    ->can('edit', 'blueprint')
    ->name('blueprints.update');
Route::delete('/blueprints/{blueprint}', [BlueprintController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'blueprint')
    ->name('blueprints.destroy');

// blaze
Route::get('/dashboard', function () {
    $blueprints = Auth::user()->blueprints()->with('category')->get();
    return view('dashboard', compact('blueprints'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
