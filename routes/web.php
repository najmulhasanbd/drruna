<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\YoutubeController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Frontend\FrontendController;

// frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/service-page', [FrontendController::class, 'service'])->name('service');
Route::get('/faq-page', [FrontendController::class, 'faq'])->name('faq');
Route::get('/gallery-page', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/video-page', [FrontendController::class, 'video'])->name('video');

//review store
Route::post('review-store', [FrontendController::class, 'reviewStore'])->name('review.store');

// admin
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        //review
        Route::get('review', [AdminController::class, 'review'])->name('review.list');
        Route::get('review/status/{id}', [AdminController::class, 'reviewStatus'])->name('review.status');
        Route::delete('review/destroy/{id}', [AdminController::class, 'destroy'])->name('review.destroy');

        // slider
        Route::controller(SliderController::class)
            ->prefix('slider')
            ->name('slider.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');

                Route::get('/edit/{slider}', 'edit')->name('edit');
                Route::post('/update/{slider}', 'update')->name('update');
                Route::get('/delete/{slider}', 'destroy')->name('delete');
            });
        // featured
        Route::controller(FeatureController::class)
            ->prefix('featured')
            ->name('featured.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');

                Route::get('/edit/{featured}', 'edit')->name('edit');
                Route::post('/update/{feature}', 'update')->name('update');
                Route::get('/delete/{featured}', 'destroy')->name('delete');
            });
        // service
        Route::controller(ServiceController::class)
            ->prefix('service')
            ->name('service.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{service}', 'edit')->name('edit');
                Route::post('/update/{service}', 'update')->name('update');
                Route::get('/delete/{service}', 'destroy')->name('delete');
            });
        // education
        Route::controller(EducationController::class)
            ->prefix('education')
            ->name('education.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{education}', 'edit')->name('edit');
                Route::post('/update/{education}', 'update')->name('update');
                Route::get('/delete/{education}', 'destroy')->name('delete');
            });
        // award
        Route::controller(AwardController::class)
            ->prefix('award')
            ->name('award.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{award}', 'edit')->name('edit');
                Route::post('/update/{award}', 'update')->name('update');
                Route::get('/delete/{award}', 'destroy')->name('delete');
            });
        // gallery
        Route::controller(GalleryController::class)
            ->prefix('gallery')
            ->name('gallery.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{gallery}', 'edit')->name('edit');
                Route::post('/update/{gallery}', 'update')->name('update');
                Route::get('/delete/{gallery}', 'destroy')->name('delete');
            });
        // faq
        Route::controller(FaqController::class)
            ->prefix('faq')
            ->name('faq.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{faq}', 'edit')->name('edit');
                Route::post('/update/{faq}', 'update')->name('update');
                Route::get('/delete/{faq}', 'destroy')->name('delete');
            });
        // youtube
        Route::controller(YoutubeController::class)
            ->prefix('youtube')
            ->name('youtube.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');

                Route::get('/edit/{youtube}', 'edit')->name('edit');
                Route::post('/update/{youtube}', 'update')->name('update');
                Route::get('/delete/{youtube}', 'destroy')->name('delete');
            });
        // experience
        Route::controller(ExperienceController::class)
            ->prefix('experience')
            ->name('experience.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{experience}', 'edit')->name('edit');
                Route::put('/update/{experience}', 'update')->name('update');
                Route::get('/delete/{experience}', 'destroy')->name('delete');
            });

        // Setting routes
        Route::controller(SettingController::class)
            ->prefix('setting')
            ->name('setting.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
