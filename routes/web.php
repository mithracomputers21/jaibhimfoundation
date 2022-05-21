<?php

use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\HabitationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PanchayatController;
use App\Http\Controllers\Admin\PaymentmethodController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // District
    Route::resource('districts', DistrictController::class, ['except' => ['store', 'update', 'destroy']]);

    // Block
    Route::resource('blocks', BlockController::class, ['except' => ['store', 'update', 'destroy']]);

    // Panchayat
    Route::resource('panchayats', PanchayatController::class, ['except' => ['store', 'update', 'destroy']]);

    // Habitation
    Route::resource('habitations', HabitationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Member
    Route::post('members/media', [MemberController::class, 'storeMedia'])->name('members.storeMedia');
    Route::resource('members', MemberController::class, ['except' => ['store', 'update', 'destroy']]);

    // Paymentmethod
    Route::resource('paymentmethods', PaymentmethodController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
