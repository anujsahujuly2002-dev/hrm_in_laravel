<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\BankingController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\OPDController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilityController;
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

Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
    Route::get('signup', [AccountController::class, 'signup'])->name('signup');
});

// Check users count
Route::group(['middleware' => 'CheckUserCount'], function () {
    Route::get('accounts/login', [AccountController::class, 'login'])->name('accounts.login');
    // Check auth
    Route::group(['middleware' => 'CheckAuth'], function () {

        // Check store
        Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
            Route::get('setup-your-company', [AccountController::class, 'setupStore'])->name('setup.store');
        });

        Route::group(['middleware' => 'CheckStore'], function () {

            // Logout
            Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');

            Route::get('/', [HomeController::class, 'dashboard'])->name('index');

            // Disease
            Route::group(['prefix' => 'disease', 'as' => 'disease.'], function () {
                Route::get('', [DiseaseController::class, 'index'])->name('index');
            });

            // Medcine
            Route::group(['prefix' => 'medicine', 'as' => 'medicine.'], function () {
                Route::get('', [MedicineeController::class, 'index'])->name('index');
            });

            // Test
            Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
                Route::get('', [TestController::class, 'index'])->name('index');
            });

            // Patient
            Route::group(['prefix' => 'patient', 'as' => 'patient.'], function () {
                Route::get('', [PatientController::class, 'index'])->name('index');
                Route::get('create', [PatientController::class, 'create'])->name('create');
                Route::get('check-up', [PatientController::class, 'checkup'])->name('checkup');
                Route::get('receipt', [PatientController::class, 'receipt'])->name('receipt');
            });

            // DM Relations
            Route::group(['prefix' => 'dm-relations', 'as' => 'dmrelations.'], function () {
                Route::get('', [DiseaseController::class, 'dmRelation'])->name('index');
            });

            // Dealers
            Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                Route::get('', [DealerController::class, 'index'])->name('index');
            });

            // Purchase
            Route::group(['prefix' => 'purchase', 'as' => 'purchase.'], function () {
                Route::get('all', [PurchasesController::class, 'index'])->name('index');
                Route::get('new', [PurchasesController::class, 'new'])->name('new');
            });

            // Payment
            Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
                Route::get('receive', [PaymentController::class, 'index'])->name('index');
            });

            // OPD
            Route::group(['prefix' => 'opd', 'as' => 'opd.'], function () {
                Route::get('', [OPDController::class, 'index'])->name('index');
            });

            // Doctor
            Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function () {
                Route::get('', [DoctorController::class, 'index'])->name('index');
                Route::get('create', [DoctorController::class, 'create'])->name('create');
            });

            // Utils
            Route::group(['prefix' => 'utility', 'as' => 'utility.'], function () {
                Route::get('', [UtilityController::class, 'index'])->name('index');
                Route::get('add-user', [UtilityController::class, 'addUser'])->name('add.user');
                Route::get('profile-update', [UtilityController::class, 'profile'])->name('profile.update');
                Route::get('change-password', [UtilityController::class, 'password'])->name('change.password');
            });

            // Appointments
            Route::group(['prefix' => 'appointments', 'as' => 'appointments.'], function () {
                Route::get('', [AppointmentsController::class, 'index'])->name('index');
            });

            // Reports
            Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
                Route::get('', [ReportsController::class, 'index'])->name('index');
                Route::get('report/{report}', [ReportsController::class, 'report'])->name('report');
            });
        });
    });
});
