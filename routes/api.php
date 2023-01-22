<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderInvoicesController;
use App\Http\Controllers\PdfController;

Route::group(['prefix' => '/v1'], function () {

    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/show/{id}', [ProviderInvoicesController::class, 'show']);
    });

    Route::group(['prefix' => 'pdf'], function () {
        Route::post('/merge',         [PdfController::class, 'Merge'   ]);
        Route::get('/download',       [PdfController::class, 'Download']);
        Route::post('/getBasePdf',    [PdfController::class, 'GetPdf'  ]);
        Route::post('/convertToPDF',  [PdfController::class, 'ConvertToPDF']);
    });

});
