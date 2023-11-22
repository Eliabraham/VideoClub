<?php
    use Illuminate\Support\Facades\Route;
    use App\Livewire\Customer\Lista as cliente;
    Route::get('/',cliente::class)->name('clientes.index');
