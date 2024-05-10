<?php

use App\Http\Controllers\PictureController;
use App\Http\Controllers\PropertyController;
use Inertia\Inertia;
use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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

Route::get('/', [WebController::class, 'welcome'])->name('home');

Route::get('/about', [WebController::class, 'about'])->name('about');

Route::get('/services', [WebController::class, 'services'])->name('services');

Route::get('/properties/{category?}', [WebController::class, 'properties'])->name('properties');

Route::get('/property/{property?}', [WebController::class, 'property'])->name('property');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact', [WebController::class, 'postContact'])->name('post-contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('dashboard')->prefix('dashboard')->group(function () {
    Route::get('', function () {
        return Inertia::render('Dashboard/Index', [
            'stats' => [
                "properties" => Property::all()->count(),
                "sold" => Property::where('status', 'sold')->get()->count(),
                "sales" => [28, 34, 27, 85, 76, 108, 8]
            ]
        ]);
    });
    Route::name('-properties')->prefix('properties')->group(function () {
        Route::get('', [PropertyController::class, 'index']);
        Route::get('show/{property}', [PropertyController::class, 'show'])->name('-show');
        Route::post('', [PropertyController::class, 'store'])->name('-store');
        Route::patch('{property}', [PropertyController::class, 'update'])->name('-update');
        Route::delete('{property}', [PropertyController::class, 'destroy'])->name('-destroy');
        Route::patch('publish/{property}', [PropertyController::class, 'publish'])->name('-publish');
        Route::patch('status/{property}', [PropertyController::class, 'status'])->name('-status');
        Route::patch('feature/{property}', [PropertyController::class, 'feature'])->name('-feature');
        Route::patch('hot/{property}', [PropertyController::class, 'hot'])->name('-hot');
    });
    Route::name('-pictures')->prefix('pictures')->controller(PictureController::class)->group(function () {
        Route::get('', 'index');
        Route::post('', 'store')->name('-store');
        Route::patch('{picture}', 'update')->name('-update');
        Route::delete('{picture}', 'destroy')->name('-destroy');
    });
});
