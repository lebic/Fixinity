<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AutoAddressController;
use App\Http\Controllers\RequestController;

use App\Http\Controllers\CompanyRequestDetailsController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TestFooter;
use App\Http\Controllers\TestFooter2;


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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

/*ROUTE FOR HTML/CSS VIEW OF PAGES */
Route::get('/client-dashboard-htmlcss', function () {
    return view('client-dashboard-htmlcss');
});

Route::get('/company-dashboard-htmlcss', function () {
    return view('company-dashboard-htmlcss');
});

Route::get('/request-form-htmlcss', function () {
    return view('request-form-htmlcss');
});

Route::get('/request-details-client-htmlcss', function () {
    return view('request-details-client-htmlcss');
});

Route::get('/request-details-company-htmlcss', function () {
    return view('request-details-company-htmlcss');
});

Route::get('/new-offer', function () {
    return view('components/new-offer');
});

/*----------------------------------*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/requests-form', function () {
    return view('requests-form');
});




Route::get('/list', [CategoriesController::class, 'show']);

/* Route::get('/categories', [CategoriesController::class, 'categories']);

Route::post('/categories', [CategoriesController::class, 'plumbery']);
Route::post('/categories', [CategoriesController::class, 'maintenance']);

Route::post('/categories', [CategoriesController::class, 'electricity']); */


/* Route::get('/requests', [CategoriesController::class, 'requests'])->middleware(['auth']); */
Route::post('/requests-form', [CategoriesController::class, 'send_request']);

Route::get('/user/{id}', [CategoriesController::class, 'show'])->name('users.show');

Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');

Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');





Route::get('/footer', [TestFooter::class, 'testfooter']);
Route::post('/footer', [TestFooter::class, 'index']);

//midleware private 

/* Route::get('/dashboard', function () {

    $user = Auth::user();

    $type = Auth::user()->type;
    $checkrole = explode(',', $type);
    if (in_array('company', $checkrole)) {
        return view('dashboard');
    } else {
        return view('dashboard');
    } 
})->middleware(['auth'])->name('dashboard'); */
Route::get('/requests-form', function () {
    $user = Auth::user();

    $type = Auth::user()->type;
    $checkrole = explode(',', $type);
    if (in_array('company', $checkrole)) {
        return view('dashboard');
    } else {
        return view('requests-form');
    }
})->middleware(['auth'])->name('requests-form');
require __DIR__ . '/auth.php';


Route::get('/request-details/{id}', [CompanyRequestDetailsController::class, 'showRequest'])->middleware(['auth'])->name('request-detail');
Route::get('/offer-details/{offerid}', [CompanyRequestDetailsController::class, 'showOffer'])->middleware(['auth'])->name('request-detail');
Route::post('/request-details/{id}', [CompanyRequestDetailsController::class, 'send_offer']);

//no id use if statement in controller

Route::get('/dashboard', [UserController::class, 'showDefault'])->middleware(['auth'])->name('dashboard');

/* Route::get('/profile/{id}', [UserController::class, 'show'])->middleware(['auth'])->name('users.show'); */
/* Route::get('/company-request-details', [CompanyRequestDetailsController::class, 'index']);
Route::post('/company-request-details', [CompanyRequestDetailsController::class, 'store']);
Route::get('/company-request-details/{id}', [CompanyRequestDetailsController::class, 'showRequest']); */