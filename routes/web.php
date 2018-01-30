<?php

//site
Route::get('/', 'HomeController@index');

//main supreme boot


#Supreme CMS
Route::group(["prefix" => 'Supreme', 'middleware' => 'auth'], function () {

    Route::resource('/', 'Supreme\SupremeController');

    //sliders
    Route::resource('Slider', 'Supreme\Cms\SliderController', ['name' => 'Slider']);

    //slides
    Route::get('Slide/create/{id}', ['as' => 'Slide.create', 'uses' => 'Supreme\Cms\SlideController@create']);
    Route::resource('Slide', 'Supreme\Cms\SlideController', ['except' => 'create']);

    //settings
    Route::resource('cms/settings/main', 'Supreme\Cms\Settings\MainController', ['name' => 'main']);

});

// Authentication Routes...
$this->get('Supreme/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('Supreme/login', 'Auth\LoginController@login');
$this->post('Supreme/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');


