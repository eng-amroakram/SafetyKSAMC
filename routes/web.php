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
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
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


Route::get('set11', function () {
    // // Step 1: Fetch data from the 'safe' database where id is between 1894 and 1951
    // $answers = DB::connection('safe')
    //     ->table('answers')
    //     ->whereBetween('id', [1894, 1951])
    //     ->get();

    // $new_ids = [
    //     "36" => 31,
    //     "17" => 18,
    //     "33" => 34,
    //     "24" => 25,
    //     "11" => 12,
    // ];

    // $form_ids = [
    //     19 => 15,
    //     1 => 13,
    //     18 => 16,
    //     2 => 14,
    //     15 => 18,
    //     12 => 21,
    //     14 => 19,
    //     3 => 12,
    //     13 => 20,
    //     10 => 5,
    //     7 => 8,
    // ];


    // // Step 2: Save the fetched data into the new database
    // foreach ($answers as $answer) {
    //     DB::connection('mysql')->table('answers')->insert([
    //         'user_id' => $new_ids[$answer->user_id],
    //         'form_id' => $form_ids[$answer->form_id],
    //         'solutions' => $answer->solutions,
    //         'notes' => $answer->notes,
    //         'created_at' => $answer->created_at, // Use original created_at
    //         'updated_at' => $answer->updated_at, // Use original updated_at
    //     ]);
    // }

    // return "Data transferred successfully for IDs between 1894 and 1951!";
    $data = config('data.forms.table-body.weekly');

    foreach ($data as $form => $questions) {

        if ($form == "external_weekly_warehouses") {
            DB::table('forms')->insert([
                'name' => $form,
                'type' => "weekly",
                'created_at' => now()
            ]);
        }

        if ($form == "weekly_warehouse") {
            foreach ($questions as $question_en => $question_ar) {
                DB::table('questions')->insert([
                    'question' => $question_en,
                    'form_id' => 24,
                    'created_at' => now()
                ]);
            }
        }

        if ($form == "external_weekly_warehouses") {
            foreach ($questions as $question_en => $question_ar) {
                DB::table('questions')->insert([
                    'question' => $question_en,
                    'form_id' => 25,
                    'created_at' => now()
                ]);
            }
        }
    }
});
