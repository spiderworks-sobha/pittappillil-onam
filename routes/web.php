<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\SpecialInvoiceController;
use App\Http\Controllers\Admin\SubmissionController;
use App\Http\Controllers\Admin\ClaimedSubmissionController;




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
Route::post('check-invoice', [HomeController::class, 'check_invoice'])->name('check-invoice');
Route::post('submissions/save', [HomeController::class, 'save'])->name('submissions.save');
Route::get('invoice', [HomeController::class, 'invoice'])->name('invoice');
Route::post('invoice/search', [HomeController::class, 'invoice_search'])->name('invoice.search');

Route::get('generate-password', function(){
    echo bcrypt('Admin@2022');
})->name('generate-password');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    //gifts
    Route::get('gifts', [GiftController::class, 'index'])->name('admin.gifts.index');
    Route::get('gifts/create', [GiftController::class, 'create'])->name('admin.gifts.create');
    Route::get('gifts/edit/{id}', [GiftController::class, 'edit'])->name('admin.gifts.edit');
    Route::get('gifts/destroy/{id}', [GiftController::class, 'destroy'])->name('admin.gifts.destroy');
    Route::get('gifts/change-status/{id}', [GiftController::class, 'changeStatus'])->name('admin.gifts.change-status');
    Route::post('gifts/store', [GiftController::class, 'store'])->name('admin.gifts.store');
    Route::post('gifts/update', [GiftController::class, 'update'])->name('admin.gifts.update');

    //special invoices
    Route::get('special-invoices', [SpecialInvoiceController::class, 'index'])->name('admin.special-invoices.index');
    Route::get('special-invoices/create', [SpecialInvoiceController::class, 'create'])->name('admin.special-invoices.create');
    Route::get('special-invoices/edit/{id}', [SpecialInvoiceController::class, 'edit'])->name('admin.special-invoices.edit');
    Route::get('special-invoices/destroy/{id}', [SpecialInvoiceController::class, 'destroy'])->name('admin.special-invoices.destroy');
    Route::get('special-invoices/change-status/{id}', [SpecialInvoiceController::class, 'changeStatus'])->name('admin.special-invoices.change-status');
    Route::post('special-invoices/store', [SpecialInvoiceController::class, 'store'])->name('admin.special-invoices.store');
    Route::post('special-invoices/update', [SpecialInvoiceController::class, 'update'])->name('admin.special-invoices.update');

    //submissions
    Route::get('submissions', [SubmissionController::class, 'index'])->name('admin.submissions.index');
    Route::get('submissions/create', function(){
        return abort('404');
    })->name('admin.submissions.create');
    Route::get('submissions/edit/{id}', [SubmissionController::class, 'edit'])->name('admin.submissions.edit');
    Route::get('submissions/destroy/{id}', [SubmissionController::class, 'destroy'])->name('admin.submissions.destroy');
    Route::get('submissions/change-status/{id}', function(){
        return abort('404');
    })->name('admin.submissions.change-status');
    Route::post('submissions/update', [SubmissionController::class, 'update'])->name('admin.submissions.update');

    //claimed submissions
    Route::get('claimed-submissions', [ClaimedSubmissionController::class, 'index'])->name('admin.claimed-submissions.index');
    Route::get('submissions/create', function(){
        return abort('404');
    })->name('admin.claimed-submissions.create');
    Route::get('claimed-submissions/edit/{id}', [ClaimedSubmissionController::class, 'edit'])->name('admin.claimed-submissions.edit');
    Route::get('claimed-submissions/destroy/{id}', function(){
        return abort('404');
    })->name('admin.claimed-submissions.destroy');
    Route::get('claimed-submissions/change-status/{id}', function(){
        return abort('404');
    })->name('admin.claimed-submissions.change-status');

    // settings
    Route::get('admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('admin/setting/update', [SettingsController::class, 'update'])->name('admin.setting.update');
});

require __DIR__ . '/auth.php';
