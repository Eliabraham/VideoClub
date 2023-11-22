<?php
    use Illuminate\Support\Facades\Route;
    use App\Livewire\Customer\Lista as cliente;
    Route::prefix('/Customer')->group(function () {
        Route::get('/lista',cliente::class)->name('clientes.index');
    });
