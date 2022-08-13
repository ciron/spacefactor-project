<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\QuotationController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\PageController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
 
 

 
 
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('quiz', [PageController::class, 'quiz'])->name('page.quiz');
Route::get('quiz/take', [PageController::class, 'takeQuiz'])->name('page.quiz.take');
Route::post('quiz/take', [PageController::class, 'storeTakeQuiz'])->name('page.quiz.take.store');
Route::get('quiz/result', [PageController::class, 'showQuizResult'])->name('page.quiz.result');
Route::get('trands', [PageController::class, 'trands'])->name('page.trands');
Route::get('about-us', [PageController::class, 'about'])->name('page.about');
Route::get('design-service/{detail}', [PageController::class, 'designService'])->name('page.design_service');
Route::get('projects', [PageController::class, 'projects'])->name('page.project');
Route::get('projects/{slug}', [PageController::class, 'projects'])->name('page.project.slug');
Route::get('projects/{category}', [PageController::class, 'projects'])->name('page.project.category');
Route::get('mood-boord', [PageController::class, 'moodBoard'])->name('page.mood_board');
Route::get('mood-boord/{detail}', [PageController::class, 'moodBoard'])->name('page.mood_board.detail');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('quotation/send', [QuotationController::class, 'send'])->name('quotation.send');
Route::get('style-guide', [PageController::class, 'styleGuide'])->name('page.style_guide');
Route::get('blog', [PageController::class, 'blog'])->name('page.blog');
Route::post('get-style-images', [PageController::class, 'getStyleImages']);
Route::post('options_store', [PageController::class, 'options'])->name('page.quiz_options');
Route::get('attribute-description/{keyword}', [PageController::class, 'attribDescription']);

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

