<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('home');
}));

Route::controller('user', 'UsersController', array(
  'getLogin' => 'user.login',
  'postLogin' => 'user.login.post',
  'getSignup' => 'user.signup',
  'postSignup' => 'user.signup.post',
  'getAccount' => 'user.account',
  'postAccount' => 'user.account.post',
  'getLogout' => 'user.logout',
));
// Had to add this to get named route correct
Route::get('dashboard', array('as' => 'user.dashboard', 'uses' => 'UsersController@getIndex'));

Route::controller('password', 'RemindersController', array(
  'getRemind' => 'password.remind',
  'postRemind' => 'password.remind.post', 
));

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{
  Route::resource('users', 'AdminUsersController');
});
