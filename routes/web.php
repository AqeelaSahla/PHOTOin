<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/frame', function () {
    return view('frame');
});

Route::get('/panduan', function () {
    return view('panduan');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/studio', function () {
    return view('studio');
});

Route::get('/export', function () {
    return view('export');
});