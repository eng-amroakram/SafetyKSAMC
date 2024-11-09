<?php

use App\Http\Controllers\AdminPanelViewsController;
use App\Http\Controllers\WebViewsController;
use App\Livewire\Admin\Auth\Login as AdminLogin;
use App\Livewire\Admin\Panel\ContactUs;
use App\Livewire\Admin\Panel\Index;
use App\Livewire\Admin\Panel\Users;
use App\Livewire\Admin\Panel\Viewer;
use App\Livewire\Web\Auth\Login as WebLogin;
use App\Livewire\Web\Home;
use App\Livewire\Web\Landing;
use App\Livewire\Web\Refrigerants;
use App\Livewire\Web\Signature;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(WebViewsController::class)
    ->as('web.')
    ->prefix('/')
    ->middleware(['web'])
    ->group(function () {
        Route::get('', Landing::class)->name('landing');

        Route::middleware(['guest'])->group(function () {
            Route::get('login', WebLogin::class)->name('login');
        });

        Route::middleware(['auth'])->group(function () {
            Route::get('home', Home::class)->name('home');
            Route::get('signature', Signature::class)->name('signature');
            Route::get('refrigerants', Refrigerants::class)->name('refrigerants');
            Route::get('logout', 'logout')->name('logout');
        });
    });


Route::as('admin.')->prefix('admin')->middleware(['web', 'onlyAdmin'])->group(function () {

    Route::prefix('panel')->as('panel.')->middleware(['auth'])->group(function () {
        Route::get('', Index::class)->name('index');
        Route::get('viewer/{user}', Viewer::class)->name('viewer');
        Route::get('users', Users::class)->name('users');
        Route::get('contact-us', ContactUs::class)->name('contact-us');
        Route::get('logout', [AdminPanelViewsController::class, 'logout'])->name('logout');
    });

    Route::middleware(['guest'])->group(function () {
        Route::get('login', AdminLogin::class)->name('login');
    });
});
