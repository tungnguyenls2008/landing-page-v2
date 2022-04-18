<?php

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


Auth::routes([
    'register' => false,
    'verify' => true
]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::post('/admin', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('home.save');

    Route::group(['prefix' => 'layout', 'as' => 'layout.'], function () {
        //Home
        Route::get('/home', [App\Http\Controllers\Admin\LayoutHomeController::class, 'index'])->name('home');
        Route::post('/home', [App\Http\Controllers\Admin\LayoutHomeController::class, 'store'])->name('home.save');

        //About Us
        Route::get('/about-us', [App\Http\Controllers\Admin\LayoutAboutUsController::class, 'index'])->name('about-us');
        Route::post('/about-us', [App\Http\Controllers\Admin\LayoutAboutUsController::class, 'store'])->name('about-us.save');

        Route::get('/skills', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('skills');
        Route::post('/skills', [App\Http\Controllers\Admin\SkillController::class, 'store'])->name('skills.add');
        Route::get('/skills/{id}', [App\Http\Controllers\Admin\SkillController::class, 'get'])->name('skills.get');
        Route::post('/skills/edit', [App\Http\Controllers\Admin\SkillController::class, 'update'])->name('skills.edit');
        Route::delete('/skills/{id}', [App\Http\Controllers\Admin\SkillController::class, 'destroy'])->name('skills.delete');

        //Works
        Route::get('/work', [App\Http\Controllers\Admin\LayoutWorkController::class, 'index'])->name('work');
        Route::post('/work', [App\Http\Controllers\Admin\LayoutWorkController::class, 'store'])->name('work.save');

        Route::get('/work-category', [App\Http\Controllers\Admin\WorkCategoryController::class, 'index'])->name('work-category');
        Route::post('/work-category', [App\Http\Controllers\Admin\WorkCategoryController::class, 'store'])->name('work-category.add');
        Route::get('/work-category/{id}', [App\Http\Controllers\Admin\WorkCategoryController::class, 'get'])->name('work-category.get');
        Route::post('/work-category/edit', [App\Http\Controllers\Admin\WorkCategoryController::class, 'update'])->name('work-category.edit');
        Route::delete('/work-category/{id}', [App\Http\Controllers\Admin\WorkCategoryController::class, 'destroy'])->name('work-category.delete');

        Route::get('/work-list', [App\Http\Controllers\Admin\WorkController::class, 'index'])->name('work-list');
        Route::post('/work-list', [App\Http\Controllers\Admin\WorkController::class, 'store'])->name('work-list.add');
        Route::get('/work-list/{id}', [App\Http\Controllers\Admin\WorkController::class, 'get'])->name('work-list.get');
        Route::post('/work-list/edit', [App\Http\Controllers\Admin\WorkController::class, 'update'])->name('work-list.edit');
        Route::delete('/work-list/{id}', [App\Http\Controllers\Admin\WorkController::class, 'destroy'])->name('work-list.delete');

        //Services
        Route::get('/service', [App\Http\Controllers\Admin\LayoutServiceController::class, 'index'])->name('service');
        Route::post('/service', [App\Http\Controllers\Admin\LayoutServiceController::class, 'store'])->name('service.save');

        Route::get('/service-list', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('service-list');
        Route::post('/service-list', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('service-list.add');
        Route::get('/service-list/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'get'])->name('service-list.get');
        Route::post('/service-list/edit', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('service-list.edit');
        Route::delete('/service-list/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('service-list.delete');

        //Clients
        Route::get('/client', [App\Http\Controllers\Admin\LayoutClientController::class, 'index'])->name('client');
        Route::post('/client', [App\Http\Controllers\Admin\LayoutClientController::class, 'store'])->name('client.save');

        Route::get('/client-list', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('client-list');
        Route::post('/client-list', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('client-list.add');
        Route::get('/client-list/{id}', [App\Http\Controllers\Admin\ClientController::class, 'get'])->name('client-list.get');
        Route::post('/client-list/edit', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('client-list.edit');
        Route::delete('/client-list/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('client-list.delete');
        //Visitors
        Route::get('/visitor', [App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('visitor');
        Route::post('/visitor', [App\Http\Controllers\Admin\VisitorController::class, 'store'])->name('visitor.save');

        Route::get('/visitor-list', [App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('visitor-list');
        Route::post('/visitor-list', [App\Http\Controllers\Admin\VisitorController::class, 'store'])->name('visitor-list.add');
        Route::get('/visitor-list/{id}', [App\Http\Controllers\Admin\VisitorController::class, 'get'])->name('visitor-list.get');
        Route::post('/visitor-list/edit', [App\Http\Controllers\Admin\VisitorController::class, 'update'])->name('visitor-list.edit');
        Route::delete('/visitor-list/{id}', [App\Http\Controllers\Admin\VisitorController::class, 'destroy'])->name('visitor-list.delete');

        //Reviews
        Route::get('/review', [App\Http\Controllers\Admin\LayoutReviewController::class, 'index'])->name('review');
        Route::post('/review', [App\Http\Controllers\Admin\LayoutReviewController::class, 'store'])->name('review.save');

        Route::get('/review-list', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('review-list');
        Route::post('/review-list', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('review-list.add');
        Route::get('/review-list/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'get'])->name('review-list.get');
        Route::post('/review-list/edit', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('review-list.edit');
        Route::delete('/review-list/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'destroy'])->name('review-list.delete');

        //Home
        Route::get('/general', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('general');
        Route::post('/general', [App\Http\Controllers\Admin\HomeController::class, 'store'])->name('general.save');
        Route::get('/contact', [App\Http\Controllers\Admin\LayoutContactsController::class, 'index'])->name('contact');
        Route::post('/contact', [App\Http\Controllers\Admin\LayoutContactsController::class, 'store'])->name('contact.save');
    });
});

