<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home'); // 'Home' es tu componente React en resources/js/Pages/Home.jsx
});

Route::get('/ping', fn () => response()->json(['pong' => true]));
