<?php

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

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('welcome');
// })->middleware('front_middleware');

Route::middleware(['front_middleware'])->group(function () {
    routeController('/', 'Frontend\HomeController');
    routeController('/profiles', 'Frontend\ProfileController');
    routeController('/programs', 'Frontend\ProgramsController');
    routeController('/gallery', 'Frontend\GalleryController');
    routeController('/regions', 'Frontend\RegionsController');
    routeController('/support-us', 'Frontend\DonationController');
    routeController('/contact', 'Frontend\ContactController');
    routeController('/blog', 'Frontend\BlogController');
});
