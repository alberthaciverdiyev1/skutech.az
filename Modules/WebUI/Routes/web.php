<?php

use Illuminate\Support\Facades\Route;
use Modules\WebUI\Controllers\BaseController;
use Modules\WebUI\Controllers\BlogController;
use Modules\WebUI\Controllers\HomeController;
use Modules\WebUI\Controllers\PropertyController;
use Modules\WebUI\Http\Controllers\Auth\ForgotPasswordController;
use Modules\WebUI\Http\Controllers\Auth\LoginController;
use Modules\WebUI\Http\Controllers\Auth\RegisterController;
use Modules\WebUI\Http\Controllers\Auth\OtpController;
use Modules\WebUI\Http\Controllers\Auth\ResetPasswordController;

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog-detail/{slug}', 'blogDetail')->name('blog.details');
});

Route::controller(PropertyController::class)->group(function () {
    Route::get('/listing', 'listing')->name('listing');
    Route::get('/property/{id}', 'propertyDetail')->name('property.detail');

});
Route::controller(\Modules\WebUI\Controllers\AgencyController::class)->group(function () {
    Route::get('/agency-detail/{id}', 'agencyDetail')->name('agency.detail');
    Route::get('/agencies/{id}', 'agencyDetail')->name('agency.details');
    Route::get('/agencies', 'agencies')->name('agencies');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/fake-listing', 'fakeListing')->name('fake.listing');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/check-real-404-path', function () {
        $path = base_path('Modules/WebUI/Resources/views/errors/404.blade.php');

        return response()->json([
            'correct_path' => $path,
            'file_exists' => file_exists($path),
            'file_content' => file_exists($path) ? file_get_contents($path) : null,
            'directory_listing' => scandir(dirname($path))
        ]);
    });
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/coming-soon', action: 'comingSoon')->name(name: 'comingSoon');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get(uri:'/login',action:[LoginController::class,'login'])->name(name:'login');

Route::get(uri:'/otp',action:[OtpController::class,'otp'])->name(name:'otp');
Route::get('/forgot-password', [ForgotPasswordController::class, 'login'])->name('forgot-password');
Route::get('/reset-password', [ResetPasswordController::class, 'resetpassword'])->name('reset-password');






//
//Route::domain(config('app.url'))->prefix(config('app.url'))->group(function () {
//    Route::get('/', [HomeController::class, 'index'])->name('home');
////    Route::controller(HomeController::class)->group(function () {
////        Route::get('/', 'index')->name('home');
////    });
//});
//
//

//Route::controller(HomeController::class)->group(function () {
//    Route::get('/', 'index')->name('home');
//    Route::get('/contact-us', 'contact')->name('contact');
//    Route::get('/about/{variable}', 'about')->name('about');
//    Route::get('/service/{slug}', 'serviceDetails')->name('service');
//    Route::get('/news', 'news')->name('news');
//    Route::get('/news/{slug}', 'newsDetails')->name('newsDetails');
//    Route::post('/contact-us', 'contactRequest')->name('contactRequest');
//    Route::get('/search', 'search')->name('search');
//});
