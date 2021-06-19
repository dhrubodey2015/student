<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Scheme\SchemesController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\PolicyGenerate\PoliciesGenerateController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MarkController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
//--------------------------- Admin Login ---------------------------
Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'adminLoginCheck'])->name('admin.login.check');
Route::post('get-policy', [CustomerController::class, 'getCustomerPolicy'])->name('get.policy');
Route::get('certificate/download/{id}', [PoliciesGenerateController::class, 'certificate_download'])->name('certificate.download');
Auth::routes();
//--------------------------- Admin Panel ---------------------------
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function () {

    //-------------------------user or Student ---------------------------

    Route::prefix('student/')->name('user.')->group(function () {
        Route::get('index', [UsersController::class, 'index'])->name('index');
        Route::get('create', [UsersController::class, 'create'])->name('create');
        Route::post('get-user-list', [UsersController::class, 'userList'])->name('get.list');
        Route::post('store', [UsersController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::post('update', [UsersController::class, 'update'])->name('update');
        Route::post('destroy', [UsersController::class, 'destroy'])->name('destroy');
    });
    //--------------------------- Semester ---------------------------
    Route::prefix('semester/')->name('semester.')->group(function () {
        Route::get('index', [SemesterController::class, 'index'])->name('index');
        Route::get('create', [SemesterController::class, 'create'])->name('create');
        Route::post('get-semester-list', [SemesterController::class, 'semesterList'])->name('get.list');
        Route::post('store', [SemesterController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SemesterController::class, 'edit'])->name('edit');
        Route::post('update', [SemesterController::class, 'update'])->name('update');
        Route::post('destroy', [SemesterController::class, 'destroy'])->name('destroy');
    });
    //--------------------------- Subject ---------------------------
    Route::prefix('subject/')->name('subject.')->group(function () {
        Route::get('index', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('get-subject-list', [SubjectController::class, 'subjectList'])->name('get.list');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('edit');
        Route::post('update', [SubjectController::class, 'update'])->name('update');
        Route::post('destroy', [SubjectController::class, 'destroy'])->name('destroy');
    });


    //--------------------------- Marks ---------------------------
    Route::prefix('marks/')->name('marks.')->group(function () {
        Route::get('index', [MarkController::class, 'index'])->name('index');
        Route::get('create', [MarkController::class, 'create'])->name('create');
        Route::post('get-marks-list', [MarkController::class, 'marksList'])->name('get.list');
        Route::post('store', [MarkController::class, 'store'])->name('store');
        Route::get('edit/{id}', [MarkController::class, 'edit'])->name('edit');
        Route::post('update', [MarkController::class, 'update'])->name('update');
        Route::post('destroy', [MarkController::class, 'destroy'])->name('destroy');
    });

















    //--------------------------- Customer ---------------------------
    Route::prefix('customer/')->name('customer.')->group(function () {
        Route::get('index', [CustomerController::class, 'index'])->name('index');
        Route::get('create', [CustomerController::class, 'create'])->name('create');
        Route::post('get-customer-list', [CustomerController::class, 'customerList'])->name('get.list');
        Route::post('store', [CustomerController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('update', [CustomerController::class, 'update'])->name('update');
        Route::post('destroy', [CustomerController::class, 'destroy'])->name('destroy');
    });
    //--------------------------- Schemes ---------------------------
    Route::prefix('scheme/')->name('scheme.')->group(function () {
        Route::get('index', [SchemesController::class, 'index'])->name('index');
        Route::post('store', [SchemesController::class, 'store'])->name('store');
        Route::post('get-scheme-list', [SchemesController::class, 'schemeList'])->name('get.list');
        Route::get('edit/{id}', [SchemesController::class, 'edit'])->name('edit');
        Route::post('update', [SchemesController::class, 'update'])->name('update');
        Route::post('delete', [SchemesController::class, 'destroy'])->name('delete');
    });
    //--------------------------- Policy ---------------------------
    Route::prefix('policy_generate/')->name('policy_generate.')->group(function () {
        Route::get('index', [PoliciesGenerateController::class, 'index'])->name('index');
        Route::post('get-list', [PoliciesGenerateController::class, 'policyGenerateList'])->name('get.list');
        Route::post('store', [PoliciesGenerateController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PoliciesGenerateController::class, 'edit'])->name('edit');
        Route::post('update', [PoliciesGenerateController::class, 'update'])->name('update');
        Route::post('destroy', [PoliciesGenerateController::class, 'destroy'])->name('destroy');
        Route::post('close/policy', [PoliciesGenerateController::class, 'closePolicy'])->name('close.policy');
        Route::post('open/policy', [PoliciesGenerateController::class, 'openPolicy'])->name('open.policy');
        Route::get('certificate/download/{id}', [PoliciesGenerateController::class, 'certificate_download'])->name('certificate.download');
        Route::get('delete/payment/file/{id}', [PoliciesGenerateController::class, 'deletePaymentFile'])->name('delete.payment.file');
        Route::get('delete/certificate/file/{id}', [PoliciesGenerateController::class, 'deleteCertificateFile'])->name('delete.certificate.files');
    });
});