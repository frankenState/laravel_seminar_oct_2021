<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
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

// Route::get('/', [ PagesController::class, 'index'])->name('main');
Route::get('/contact-us', [ PagesController::class, 'contactus'])->name('contact-us');
Route::get('/show-page/{id}', [ PagesController::class, 'show_page'])->name('show-page');
/*
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
*/

Auth::routes();

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/update-profile', [UserController::class, 'update'])->name('update-profile');


Route::prefix('feedback')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/new', [FeedbackController::class, 'create'])->name('feedback.create');

    Route::get('/show/{id}', [FeedbackController::class, 'show'])->name('feedback.show');

    Route::get('/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit');

    Route::post('/save', [FeedbackController::class, 'save'])->name('feedback.save');

    Route::post('/update', [FeedbackController::class, 'update'])->name('feedback.update');
    
    Route::get('/delete/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete');
});