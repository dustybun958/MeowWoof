<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;

// All
Route::get('/', [StoriesController::class, 'index'])->name('index');
Route::get('/stories/{stories}/show', [StoriesController::class, 'show'])->name('stories.show');
Route::post('/stories/{stories}/like', [LikeController::class, 'likeStories'])->name('stories.like');
Route::get('/stories/{categories}/category', [StoriesController::class, 'viewCategory'])->name('stories.viewCategory');

// Guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register/submit', [LoginController::class, 'registerSubmit'])->name('register.submit');
});

// Auth
Route::middleware(['auth', 'online.status'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // News
    Route::get('/stories/{stories}/view', [StoriesController::class, 'view'])->name('stories.view');
    // Profile
    Route::resource('profile', UserController::class)->parameters([
        'profile' => 'user'
    ])->only([
        'edit',
        'update'
    ]);
    // Notification
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/count', [NotificationController::class, 'unreadNotificationsCount'])->name('count');
        Route::get('/fetch', [NotificationController::class, 'fetchNotifications'])->name('fetch');
        Route::post('/{id}/read', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    });
});

// Super Admin
Route::middleware(['role:Super Admin'])->group(function () {
    // News
    Route::resource('admin/stories', StoriesController::class)->names('admin.stories')->only([
        'destroy'
    ]);
    Route::get('/admin/stories/manage', [StoriesController::class, 'manage'])->name('admin.stories.manage');
    // Category
    Route::resource('admin/category', CategoryController::class)->names('admin.category')->only([
        'store',
        'update',
        'destroy'
    ]);
    Route::get('/admin/category/manage', [CategoryController::class, 'manage'])->name('admin.category.manage');
    // Users
    Route::resource('admin/users', UserController::class)->only(['index', 'destroy'])
        ->names([
            'index' => 'admin.users.manage',
            'destroy' => 'admin.users.destroy'
        ]);

    Route::patch('/admin/users/{user}/assignRole', [UserController::class, 'assignRole'])->name('admin.users.assignRole');
});

// Editor
Route::group(['middleware' => ['permission:Status Stories|Update Status Stories']], function () {
    Route::get('/stories/status', [StoriesController::class, 'status'])->name('stories.status');
    Route::patch('/stories/{stories}/updatestatus', [StoriesController::class, 'updateStatus'])->name('stories.updateStatus');
});

// Writer
Route::group(['middleware' => ['permission:Create Stories|Store Stories|Edit Stories|Update Stories|Draft']], function () {
    Route::resource('stories', StoriesController::class)->names('stories')->only([
        'create',
        'store',
        'edit',
        'update'
    ]);
    Route::get('/stories/draft', [StoriesController::class, 'draft'])->name('stories.draft');
});
