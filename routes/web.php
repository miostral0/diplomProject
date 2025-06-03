<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Command; 

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $commands = Command::latest()->take(10)->get();
    return view('dashboard', compact('commands'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('command')->middleware('auth')->group(function () {
        Route::get('/', [CommandController::class, 'index'])->name('command.index');
        Route::get('/create', [CommandController::class, 'create'])->name('command.create');
        Route::get('/create/{id}', [CommandController::class, 'create_info'])->name('command.create_info');
        Route::post('/create', [CommandController::class, 'store'])->name('command.store');
        Route::post('/create-info', [CommandController::class, 'store_info'])->name('command.store_info');
        Route::get('/{command}', [CommandController::class, 'show'])->name('command.show');
        Route::delete('/{command}', [CommandController::class, 'destroy'])->name('command.destroy');
        Route::delete('/commands/{command}/students/{student}', [CommandController::class, 'removeStudent'])->name('command.removeStudent');
        Route::delete('/commands/{command}/employees/{employee}', [CommandController::class, 'removeEmployee'])->name('command.removeEmployee');


    });
});

require __DIR__.'/auth.php';
