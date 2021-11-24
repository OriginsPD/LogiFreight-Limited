<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Home\Index;
use App\Http\Livewire\Member\Dasboard\Dashboard;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', Index::class)->name('index');

Route::get('/admin', AdminDashboard::class)
    ->name('Admin.dashboard');

Route::get('/member', Dashboard::class)
    ->name('member.dashboard');
