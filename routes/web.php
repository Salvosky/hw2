<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/homepage', "HomepageController@homepage");

Route::get('/homepage/content', "HomepageController@content");
Route::get('/homepage/holidays/{year}', "HomepageController@holidays");

Route::get('/login', "LoginController@login");
Route::post('/login', "LoginController@authentification")->name('authentification');

Route::get('/register', "RegisterController@register");
Route::post('/register', "RegisterController@create");

Route::get('/logout', "LoginController@logout");

Route::get('/profile', "ProfileController@profile");
Route::get('/profile_details/{user}', "ProfileController@profile_details");

Route::get('/searchschool', "SearchSchoolController@searchschool");
Route::get('/searchschool/searchid/{id}', "SearchSchoolController@searchid");
Route::get('/searchschool/searchall/', "SearchSchoolController@searchall");

Route::get('/schooldetails', "SchoolDetailsController@schooldetails");
Route::get('/schooldetails/seek/{id}', "SchoolDetailsController@seek");

Route::get('/classpage', "ClassPageController@classpage");
Route::get('/classpage/seek/{id}', "ClassPageController@seek");

Route::get('/your_school', "YourSchoolController@yourschool");
Route::get('/your_school/seek/{id}', "YourSchoolController@seek");

Route::get('/valutazione', "ValutazioneController@valutazione");
Route::get('/valutazione/seekalunno/{cf}', "ValutazioneController@seek");
Route::get('/valutazione/seekteacher/{cf}', "ValutazioneController@seekTeacher");

Route::get('/aggiungivoto', "AddVoteController@addvote");
Route::post('/aggiungivoto/add', "AddVoteController@add");

Route::get('/rimuovivoto', "DeleteVoteController@deletevote");
Route::post('/rimuovivoto/delete', "DeleteVoteController@delete");
?>