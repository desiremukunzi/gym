<?php

Route::group(['namespace' => 'Client'], function() {
    Route::get('/', 'HomeController@index')->name('client.dashboard');
    Route::POST('/momo', 'HomeController@momo')->name('client.momo');


    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('client.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('client.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('client.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('client.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('client.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('client.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('client.verification.verify');

});