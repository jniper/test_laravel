<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('home');
});


// Route::get('/form', function () {
//     return view('patientform');
// });

Route::resource('/form', DataController::class);


