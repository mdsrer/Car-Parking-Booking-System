<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register'=>false]);

// Login/Logout
Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

// Register
Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');

// Reset password
Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset'); 
Route::get('/','FrontendController@home')->name('home');

// Frontend Routes
Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');
Route::get('parking-detail/{slug}','FrontendController@parkingDetail')->name('parking-detail');
Route::post('/parking/search','FrontendController@parkingSearch')->name('parking.search');
Route::get('/parking-cat/{slug}','FrontendController@parkingCat')->name('parking-cat');
Route::get('/parking-sub-cat/{slug}/{sub_slug}','FrontendController@parkingSubCat')->name('parking-sub-cat');
Route::get('/parking-brand/{slug}','FrontendController@parkingBrand')->name('parking-brand');

// selectedbooking section
Route::get('/add-to-selectedbooking/{slug}','selectedbookingController@addToselectedbooking')->name('add-to-selectedbooking')->middleware('user');
Route::post('/add-to-selectedbooking','selectedbookingController@singleAddToselectedbooking')->name('single-add-to-selectedbooking')->middleware('user');
Route::get('selectedbooking-delete/{id}','selectedbookingController@selectedbookingDelete')->name('selectedbooking-delete');
Route::post('selectedbooking-update','selectedbookingController@selectedbookingUpdate')->name('selectedbooking.update');
Route::get('/selectedbooking',function(){
    return view('frontend.pages.selectedbooking');
})->name('selectedbooking');
Route::get('/checkout','selectedbookingController@checkout')->name('checkout')->middleware('user');

// parking Review
Route::resource('/review','parkingReviewController');
Route::post('parking/{slug}/review','parkingReviewController@store')->name('review.store');

// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

// User/Admin
Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    // user route
    Route::resource('users','UsersController');
    // parking
    Route::resource('/parking','parkingController');

    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');
});


Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/','HomeController@index')->name('user');
     // Profile
     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Booking
    Route::get('/booking',"HomeController@bookingIndex")->name('user.booking.index');
    Route::get('/booking/show/{id}',"HomeController@bookingShow")->name('user.booking.show');
    Route::delete('/booking/delete/{id}','HomeController@userbookingDelete')->name('user.booking.delete');
    // parking Review
    Route::get('/user-review','HomeController@parkingReviewIndex')->name('user.parkingreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@parkingReviewDelete')->name('user.parkingreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@parkingReviewEdit')->name('user.parkingreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@parkingReviewUpdate')->name('user.parkingreview.update');
    
    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});