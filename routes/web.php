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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/catalog','FoundController@catalog')->name('catalog');
Route::get('/search','HomeController@search')->name('search');
Route::get('/admin-dashboard', 'AdminController@index')->name('admin-dashboard');
Route::post('/claims/{claim}', 'FoundController@claim')->name('claim');
//Admin check & approval Claim Request
Route::get('/claim-requests/{id}', 'ClaimController@claimRequest')->name('claim-requests');
Route::get('/claim-approve/{id}', 'ClaimController@approve')->name('claim-approve');
Route::get('/claim-reject/{id}', 'ClaimController@reject')->name('claim-reject');
//Admin found detail view
Route::get('/found-detail/{id}', 'FoundController@detail')->name('found-detail');
// Comparing Lost & Found
Route::get('/found-compare/{found_id}/{lost_id}', 'MatchController@compare')->name('found-compare');
// Send Confirmation
Route::get('/send-confirmation/{found_id}/{lost_id}', 'MatchController@sendConfirmation')->name('send-confirmation');
// Approval
Route::get('/approval', 'FoundController@approval')->name('approval');
// User Update Password
Route::get('/changepassword', 'ChangePasswordController@changePasswordForm')->name('changepassword');
Route::post('/changepassword', 'ChangePasswordController@changePassword')->name('changepassword');
// Claim Receipt
Route::get('/claim-receipt/{claim_id}', 'ClaimController@receipt')->name('claim-receipt');
// Mark As Read Notifications
Route::get('/markAsRead/{id}', function($id){
    auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::get('markAllRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
})->name('markAllRead');
// Lost Solve/Unsolve
Route::get('/lost-solve/{id}', 'LostController@solve')->name('lost-solve');
Route::get('/lost-unsolve/{id}', 'LostController@unsolve')->name('lost-unsolve');
// Found Solve/Unsolve
Route::get('/found-solve/{id}', 'FoundController@solve')->name('found-solve');
Route::get('/found-unsolve/{id}', 'FoundController@unsolve')->name('found-unsolve');

Route::resource('losts', 'LostController');
Route::resource('founds', 'FoundController');
Route::resource('claims', 'ClaimController');
Route::resource('profiles', 'ProfileController');
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('matchs', 'MatchController');
