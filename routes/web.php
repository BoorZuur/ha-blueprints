<?php

use App\Http\Controllers\Admin\BlueprintController as AdminBlueprintController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        $usersCount = \App\Models\User::count();
        $categoriesCount = \App\Models\Category::count();
        $blueprintsCount = \App\Models\Blueprint::count();
        return view('admin.dashboard', compact('usersCount', 'categoriesCount', 'blueprintsCount'));
    })->name('admin.dashboard');

    // Admin Users
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Admin Categories
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Admin Blueprints
    Route::get('/admin/blueprints', [AdminBlueprintController::class, 'index'])->name('admin.blueprints.index');
    Route::get('/admin/blueprints/create', [AdminBlueprintController::class, 'create'])->name('admin.blueprints.create');
    Route::post('/admin/blueprints', [AdminBlueprintController::class, 'store'])->name('admin.blueprints.store');
    Route::get('/admin/blueprints/{blueprint}/edit', [AdminBlueprintController::class, 'edit'])->name('admin.blueprints.edit');
    Route::put('/admin/blueprints/{blueprint}', [AdminBlueprintController::class, 'update'])->name('admin.blueprints.update');
    Route::post('/admin/blueprints/{blueprint}/toggle-show', [AdminBlueprintController::class, 'toggleShow'])->name('admin.blueprints.toggleShow');
    Route::delete('/admin/blueprints/{blueprint}', [AdminBlueprintController::class, 'destroy'])->name('admin.blueprints.destroy');
});

require __DIR__ . '/auth.php';
