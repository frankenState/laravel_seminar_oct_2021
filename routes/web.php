<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# href="127.0.0.1:8000/test"
Route::get('/test-something', function () {
    return view('test', [
        'string' => 'This is a string from the web.php', 
        'customVariable1' => [],
        'num' => 0
    ]);
})->name("test_link");

Route::get('/test/user/{id}', function($id) {
    return "User ID = $id";
})->name('test_with_id');

Route::prefix('admin')->group(function (){
    # ip/admin/show/[value]
    Route::get('show/{id}', function ($id) {
        return "Showing the admin = $id";
    });

    # ip/admin/edit/[value]
    Route::get('edit/{id}', function ($id) {
        return "Editing the admin = $id";
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
