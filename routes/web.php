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

//Route::get('/', function () {
//    return view('welcome');
//});

routeController('/', 'Frontend\HomeController');
routeController('/profiles', 'Frontend\ProfileController');
routeController('/programs', 'Frontend\ProgramsController');
routeController('/gallery', 'Frontend\GalleryController');
routeController('/regions', 'Frontend\RegionsController');
routeController('/support-us', 'Frontend\DonationController');
routeController('/contact', 'Frontend\ContactController');
