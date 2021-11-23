<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you cxan register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', [
        'name' => 'Mike',
        'frameworks' => [
            'Laravel', 'Vue', 'Inertia'
        ]
    ]);
});

Route::get('/users', function () {
    return Inertia::render('Users');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});