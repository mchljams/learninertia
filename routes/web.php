<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Request;

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

Route::get('/test', function () {
    return view('app');
});

Route::get('/', function () {
    return Inertia::render('Home', [
        'name' => 'Mike',
        'frameworks' => [
            'Laravel', 'Vue', 'Inertia'
        ]
    ]);
});

Route::get('/users', function () {

    return Inertia::render('Users/Index', [
        'time' => now()->toTimeString(), 
        'users' => User::query()
            ->when(Request::input('search'), function ($query, $search ){
                $query->where('name', 'like', '%' . $search . '%'); 
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'name' => $user->name
            ]),
        'filters' => Request::only('search')
    ]);
});

Route::get('users/create', function() {
    return Inertia::render('Users/Create');
});

Route::post('/users', function () {
    $attributes = Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required',
    ]);

    User::create($attributes);

    return redirect('/users');
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd('logged out');
});

