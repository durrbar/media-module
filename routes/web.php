<?php

use Illuminate\Support\Facades\Route;
use Modules\Media\Http\Controllers\AttachmentController;
use Modules\Media\Http\Controllers\MediaController;
use Modules\Role\Enums\Permission;

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

// Route::group([], function () {
//     Route::resource('media', MediaController::class)->names('media');
// });

Route::apiResource('attachments', AttachmentController::class, [
    'only' => ['index', 'show'],
]);

/**
 * ******************************************
 * Authorized Route for Customers only
 * ******************************************
 */
Route::group(['middleware' => ['can:'.Permission::CUSTOMER, 'auth:sanctum', 'email.verified']], function (): void {

    Route::apiResource('attachments', AttachmentController::class, [
        'only' => ['store', 'update', 'destroy'],
    ]);
});
