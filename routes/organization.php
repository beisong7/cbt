<?php

// Auth routes for organization
Route::post('register', "RegistrationController@register")->name('organization.register');
Route::post('login', "LoginController@login")->name('organization.login');
