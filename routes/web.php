<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ContactController as contacto;
    use App\Http\Controllers\CustomerController as cliente;
    use App\Http\Controllers\MovieController as pelicula;
    use App\Http\Controllers\RentController as renta;

    Route::get('/', function () {return view('welcome');});

    Route::prefix('/Movies')->group(function () {
        Route::get('/list',[pelicula::class,'index'])->name('pelicula.lista');
        Route::get('/create',[pelicula::class,'create'])->name('pelicula.new');
        Route::post('/store',[pelicula::class,'store'])->name('pelicula.store');
        Route::get('/edit/{id}',[pelicula::class,'edit'])->name('pelicula.edit');
        Route::put('/update/{id}',[pelicula::class,'update'])->name('pelicula.update');
        Route::get('/show/{id}',[pelicula::class,'show'])->name('pelicula.show');
        Route::delete('/destroy/{id}',[pelicula::class,'destroy'])->name('pelicula.destroy');
    });
    Route::prefix('/Customer')->group(function () {
        Route::get('/list',[cliente::class,'index'])->name('cliente.lista');
        Route::get('/create',[cliente::class,'create'])->name('cliente.new');
        Route::post('/store',[cliente::class,'store'])->name('cliente.store');
        Route::get('/edit/{id}',[cliente::class,'edit'])->name('cliente.edit');
        Route::put('/update/{id}',[cliente::class,'update'])->name('cliente.update');
        Route::get('/show/{id}',[cliente::class,'show'])->name('cliente.show');
        Route::delete('/destroy/{id}',[cliente::class,'destroy'])->name('cliente.destroy');
    });
    Route::prefix('/Contact')->group(function () {
        Route::post('/store/{cliente}',[contacto::class,'store'])->name('contacto.create');
        Route::get('/new/{cliente}',[contacto::class,'new'])->name('contacto.new');
        Route::delete('/destroy/{id}',[contacto::class,'destroy'])->name('contacto.destroy');
    });
    Route::prefix('Rents')->group(function () {
        Route::get('/list',[renta::class,'index'])->name('renta.lista');
        Route::get('/create',[renta::class,'create'])->name('renta.new');
        Route::post('/store',[renta::class,'store'])->name('renta.store');
        Route::get('/edit/{id}',[renta::class,'edit'])->name('renta.edit');
        Route::put('/update/{id}',[renta::class,'update'])->name('renta.update');
        Route::get('/show/{id}',[renta::class,'show'])->name('renta.show');
        Route::delete('/destroy/{id}',[renta::class,'destroy'])->name('renta.destroy');
    });
