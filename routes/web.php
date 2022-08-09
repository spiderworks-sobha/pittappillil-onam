<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\WhatsappController;
use App\Http\Controllers\Web\OtpApiController;




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

Route::get('/medcity/swasthyam', [HomeController::class, 'index'])->name('swasthyam-home');
Route::get('/medcity/platinam', [HomeController::class, 'platinam_index'])->name('platinam-home');


Route::get('/test-home', [HomeController::class, 'test_index'])->name('home');

Route::post('application/save', [HomeController::class, 'save'])->name('application-save');
Route::get('/test', [HomeController::class, 'test_mail'])->name('test_mail');

Route::post('phone_check', [HomeController::class, 'phone_check'])->name('phone_check');
Route::post('otp_check', [HomeController::class, 'otp_check'])->name('otp_check');

Route::post('send', [WhatsappController::class, 'SendCard'])->name('send');
Route::post('send/discount', [WhatsappController::class, 'SendCard_discount'])->name('send-discount');

Route::get('preview-card', [HomeController::class, 'preview'])->name('preview');

Route::get('test-otp-card', [OtpApiController::class, 'send_test_otp'])->name('send_test_otp');
Route::post('temp_otp_send', [OtpApiController::class, 'TempSendOtp'])->name('temp_otp_send');

Route::post('otp_send', [OtpApiController::class, 'SendOtp'])->name('otp_send');
Route::get('dl/{id?}', [HomeController::class, 'dl']);

Route::get('date', function () {
    return  date('d/m/Y H:i:s A');
});


// Route::get('admin', function () {
//     return Redirect::to('/admin/dashboard', 301);
// });
Route::get('admin', function () {
    return Redirect::to('/admin/applications', 301);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dashboard', function () {
        return Redirect::to('/admin/applications', 301);
    })->name('admin.dashboard');
    // applications
    Route::get('admin/applications', [ApplicationController::class, 'index'])->name('admin.applications');
    Route::get('admin/application/edit/{id?}', [ApplicationController::class, 'edit'])->name('admin.applications.edit');
    Route::get('admin/application/city-filter/', [ApplicationController::class, 'city_filter'])->name('admin.application.city_filter');

    Route::post('admin/application/update', [ApplicationController::class, 'update'])->name('admin.applications.update');

    Route::get('admin/application/export/{option?}', [ApplicationController::class, 'export'])->name('admin.application.export');

    // discounts
    Route::get('admin/discounts', [DiscountController::class, 'index'])->name('admin.discounts');
    Route::get('admin/discount/create/', [DiscountController::class, 'create'])->name('admin.discounts.create');
    Route::get('admin/discount/city-filter/', [DiscountController::class, 'city_filter'])->name('admin.discounts.city_filter');

    Route::get('admin/discount/edit/{id?}', [DiscountController::class, 'edit'])->name('admin.discounts.edit');
    Route::post('admin/discount/update', [DiscountController::class, 'update'])->name('admin.discounts.update');
    Route::post('admin/discount/save', [DiscountController::class, 'save'])->name('admin.discounts.save');


    Route::get('admin/discount/export/{option?}', [DiscountController::class, 'export'])->name('admin.discounts.export');

    // settings
    Route::get('admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::post('admin/setting/update', [SettingsController::class, 'update'])->name('admin.setting.update');


    //add more Routes here
});




// Route::get('admin/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('admin.dashboard');

require __DIR__ . '/auth.php';
