<?php

# Pages
Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('menu', 'PagesController@menu');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
Route::get('information', 'PagesController@information');
Route::post('contact', 'PagesController@sendEmailEnquiry')->name('send.email');
Route::get('blog/{slug?}', 'PagesController@blog')->name('blog');
Route::get('guest/reservation', 'PagesController@createReservation')->name('create.reservation');
Route::post('guest/reservation', 'PagesController@storeReservation')->name('store.reservation');

# Authentications
Route::auth();

# Member Profile
Route::group(['prefix' => 'member', 'as' => 'member.'], function() {
	Route::get('profile', 'SessionsController@show')->name('show');
	Route::get('{user}/edit', 'SessionsController@edit')->name('edit');
	Route::patch('{user}', 'SessionsController@update')->name('update');
	Route::get('bookings', 'SessionsController@bookings')->name('bookings');
});

# Admin & Manager Profile
Route::get('admin', 'UsersController@adminIndex')->name('admin.index');
Route::get('manager', 'UsersController@managerIndex')->name('manager.index');

# Resources
Route::resource('user', 'UsersController');
Route::resource('reservations', 'ReservationsController');
Route::resource('post', 'PostsController');
Route::resource('products', 'ProductsController');

Route::post('/post/{slug}/photos', 'PhotosController@store')->name('add.photo');
Route::delete('/photo/{photo}', 'PhotosController@destroy')->name('delete.photo');
