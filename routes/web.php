<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MemberController;
use Inertia\Inertia;

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


Route::get('/', [MemberController::class,'profile'])->name('profile');

Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
    Route::get('create', [MemberController::class,'create'])->name('create');
    Route::any('update', [MemberController::class,'update'])->name('update');
    Route::any('store', [MemberController::class,'store'])->name('store');
});
Route::group(['prefix' => 'leader', 'as' => 'leader.'], function () {
    Route::get('list', [PlayerController::class,'index'])->name('list');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('dashboard', [PlayerController::class,'index'])->name('dashboard');
});
