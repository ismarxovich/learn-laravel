<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesterController as Test;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\MVCTestController;
use App\Models\User;
use App\Http\Controllers\UserProfileController;

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


Route::match(['get', 'post'], '/test', function () {
    return 'match';
});

Route::get('/tester', [Test::class, 'index']);

Route::get('/users', function (Request $request) {
    return $request;
});

Route::get('/register', [RegisterUserController::class, 'renderView']);

Route::post('/register', [RegisterUserController::class, 'createUser']);

Route::permanentRedirect('/redirect', '/redirectComplete', 301);

Route::any('/redirectComplete', function () {
    return 'redirectComplete';
})->name('redirectAll');

Route::any('/testAll', function () {
    return redirect()->route('redirectAll', ['get_test' => 'value']);
});

Route::view('/welcome', 'welcome');

Route::any('/mvc', [MVCTestController::class, 'getData']);

Route::get('/user/{id}', function ($id) {
    return 'User Profile ' . $id;
});

Route::get('/picture/{id?}', function ($id = null) {
    if ($id === null) {
        return view('pictureEmpty');
    } else {
        return view('picture', ['picture' => $id]);
    }
});


Route::domain('test.localhost')->group(function () {
    Route::get('user', function () {
        return "test subdomain";
    });
});

Route::domain('test.localhost')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/profile', function () {
            return 'test.localhost/admin/profile';
        });
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/profile', function () {
        return 'admin/profile';
    });
});

Route::name('profile.')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/info', function () {
            return 'profile/info';
        })->name('info');
        Route::get('/setpass', function () {
            return 'profile/setpass';
        })->name('setpass');
    });
});

Route::get('/test-subgroup-with-name-into-dot', function () {
    return redirect()->route('profile.info');
});

Route::get('/new-profile/{user}', function (User $user) {
    return $user->email;
});

Route::get('/controller-with-type/{user}', [UserProfileController::class, 'testHandler']);
