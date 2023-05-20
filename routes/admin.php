<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {





        Route::prefix('acp')->name('admin.')->group(function () {
            // start admin routes
            Route::controller(AuthController::class)->group(
                function () {

                    Route::get('login', 'loginPage')->name('loginPage');
                    Route::post('login', 'login')->name('login');
                    Route::delete('logout', 'logout')->name('logout');
                }
            );




            Route::middleware(['auth', 'role:super-admin|admin'])->group(function () {


                // dashboard index page
                Route::get('', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

                // dashboard index page



                // Companies
                Route::resource('companies',   CompanyController::class);
                // Companies


                // EMPLOYEES
                Route::resource('employees',   EmployeeController::class);

                // EMPLOYEES




            });
        });
    }
);
