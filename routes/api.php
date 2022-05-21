<?php

use App\Http\Controllers\Api\V1\Admin\BlockApiController;
use App\Http\Controllers\Api\V1\Admin\DistrictApiController;
use App\Http\Controllers\Api\V1\Admin\HabitationApiController;
use App\Http\Controllers\Api\V1\Admin\MemberApiController;
use App\Http\Controllers\Api\V1\Admin\PanchayatApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentmethodApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // District
    Route::apiResource('districts', DistrictApiController::class);

    // Block
    Route::apiResource('blocks', BlockApiController::class);

    // Panchayat
    Route::apiResource('panchayats', PanchayatApiController::class);

    // Habitation
    Route::apiResource('habitations', HabitationApiController::class);

    // Member
    Route::post('members/media', [MemberApiController::class, 'storeMedia'])->name('members.store_media');
    Route::apiResource('members', MemberApiController::class);

    // Paymentmethod
    Route::apiResource('paymentmethods', PaymentmethodApiController::class);
});
