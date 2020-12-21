<?php

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentDocumentController;
use App\Http\Controllers\MainController;

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
Route::get('/table/', function () {
    PDF::setOptions(['fontDir' => '{app_directory}/public/fonts/', 'defaultFont' => 'sans-serif']);
    $pdf = PDF::loadView('table', ['data' => 123]);

    return $pdf->download('table.pdf');
    return view('table');
});


Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/pay/', [PaymentDocumentController::class, 'create']);
Route::post('/store/', [PaymentDocumentController::class, 'store'])->name('store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ajax routes
Route::post('/ajax/load-oktmos', [PaymentDocumentController::class, 'oktmos']);

Route::post('/ajax/load-payment-kinds', [PaymentDocumentController::class, 'paymentKinds']);
Route::post('/ajax/load-payment-names', [PaymentDocumentController::class, 'paymentNames']);
Route::post('/ajax/load-payment-types', [PaymentDocumentController::class, 'paymentTypes']);

Route::post('/ajax/load-payer-statuses', [PaymentDocumentController::class, 'payerStatuses']);
Route::post('/ajax/load-payment-bases', [PaymentDocumentController::class, 'paymentBases']);
Route::post('/ajax/load-data-kinds', [PaymentDocumentController::class, 'dataKinds']);
Route::post('/ajax/load-period-items', [PaymentDocumentController::class, 'periodItems']);
Route::get('/ajax/load-fio', [PaymentDocumentController::class, 'fio']);
Route::get('/ajax/load-ready', [PaymentDocumentController::class, 'ready']);
Route::post('/ajax/load-kbk', [PaymentDocumentController::class, 'kbk']);
