<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoemController;

Route::get('/', function () {
    return redirect()->route('poems.index');
});

Route::resource('poems', PoemController::class);