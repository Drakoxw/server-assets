<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderInvoicesController;
use App\Http\Controllers\PdfController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => '/v1'], function () {

    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/show/{id}', [ProviderInvoicesController::class, 'show']);
    });

    Route::group(['prefix' => 'pdf'], function () {
        Route::post('/merge', [PdfController::class, 'Merge']);
        Route::get('/download', [PdfController::class, 'Download']);
    });

});
