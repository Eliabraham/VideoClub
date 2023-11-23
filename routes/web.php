<?php
    use Illuminate\Support\Facades\Route;
    use App\Livewire\Customer\Lista as cliente;
    use App\Livewire\Movie\Lista as pelicula;
    Route::prefix('/Customer')->group(function () {
        Route::get('/lista',cliente::class)->name('cliente.lista');
    });
    Route::prefix('/Movie')->group(function () {
        Route::get('/index',pelicula::class)->name('pelicula.lista');
    });