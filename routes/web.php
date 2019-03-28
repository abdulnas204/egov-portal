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

        Route::resource('voting', 'VotingController', ['except' => 'show']);
        Route::get('voting/{vote}/options', ['as' => 'voting.options.index', 'uses' => 'VotingController@optionsIndex']);
        Route::get('voting/{vote}/options/create', ['as' => 'voting.options.create', 'uses' => 'VotingController@optionsCreate']);
        Route::post('voting/{vote}/options', ['as' => 'voting.options.store', 'uses' => 'VotingController@optionsStore']);
        Route::get('voting/{vote}/options/{option}/edit', ['as' => 'voting.options.edit', 'uses' => 'VotingController@optionsEdit']);
        Route::put('voting/{vote}/options/{option}', ['as' => 'voting.options.update', 'uses' => 'VotingController@optionsUpdate']);
        Route::get('voting/{vote}/options/{option}/destroy', ['as' => 'voting.options.destroy', 'uses' => 'VotingController@optionsDestroy']);
        Route::get('voting/{vote}/votes', ['as' => 'voting.votes.index', 'uses' => 'VotingController@votesIndex']);

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

    Route::get('voting', ['as' => 'voting.index', 'uses' => 'VotingController@index']);
    Route::get('voting/{vote}', ['as' => 'voting.vote', 'uses' => 'VotingController@show']);
    Route::post('voting/{vote}/store', ['as' => 'voting.store', 'uses' => 'VotingController@store']);     

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
