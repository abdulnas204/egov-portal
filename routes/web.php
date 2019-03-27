<?php

Auth::routes(); // Adds the routes needed for authentication (multi login)

Route::group(['prefix' => 'government', 'as' => 'government.', 'namespace' => 'Government'], function () {
    Route::group(['middleware' => ['auth:government']], function () {
        Route::get('/', ['as' => 'index', function () {
            return redirect()->route('government.dashboard');
        }]);

        Route::resource('officials', 'GovernmentAdminsController');
        Route::post('officials/{official}/changepassword', ['as' => 'officials.changepassword', 'uses' => 'GovernmentAdminsController@editPassword']);

        Route::resource('citizens', 'CitizensController');
        Route::post('citizens/{citizen}/changepassword', ['as' => 'citizens.changepassword', 'uses' => 'CitizensController@editPassword']);

        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
        Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
    });

    Route::group(['middleware' => ['guest:government']], function () {

        Route::get('/', ['as' => 'index', function () {
            return redirect()->route('government.login');
        }]);

        Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
        Route::post('login', ['as' => 'login', 'uses' => 'AuthController@authenticate']);
        Route::get('activate-2fa', ['as' => 'activate_2fa', 'uses' => 'AuthController@activate2fa']);
        Route::post('activate-2fa', ['as' => 'activate_2fa', 'uses' => 'AuthController@postActivate2fa']);
    });
});

Route::group(['middleware' => ['auth:citizen']], function () {
    Route::get('/', ['as' => 'index', function () {
        return redirect()->route('dashboard');
    }]);

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
});

Route::group(['middleware' => ['guest:citizen']], function () {
	Route::get('/', function () {
		$seo_title = __('titles.notloggedin');
        return view('notloggedin', compact('seo_title'));
    })->name('notloggedin');
    
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@authenticate']);
    Route::get('activate-2fa', ['as' => 'activate_2fa', 'uses' => 'AuthController@activate2fa']);
    Route::post('activate-2fa', ['as' => 'activate_2fa', 'uses' => 'AuthController@postActivate2fa']);
});
