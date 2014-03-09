<?php

class UsersController extends \BaseController {

  protected $whitelist=array(
    'getLogin',
    'postLogin',
    'getSignup',
    'postSignup',
  );

  public function __construct()
  {
    $this->beforeFilter('csrf', array('on' => array('post')));
    $this->beforeFilter('auth', array('except' => $this->whitelist));
  }

	public function getIndex()
	{
    return View::make('user.dashboard')->withTitle('Dashboard');
	}

  public function getLogin()
  {
		return View::make('user.login')->withTitle('Login');
  }

  public function postLogin()
  {
    $input = Input::all();

    $attempt = Auth::attempt(
      array(
        'email' => $input['email'],
        'password' => $input['password'],
      ),
      isset($input['remember-me']) ? true : false
    );

    if ($attempt) return Redirect::intended('dashboard');

    Session::flash('loginError', 'Invalid username or password.');

    return Redirect::route('user.login');
  }

  public function getSignup()
  {
		return View::make('user.signup')->withTitle('Sign up');
  }

	public function postSignup()
	{
    $input = Input::all();
    $validation = Validator::make($input, User::$rules);

    if ($validation->passes())
    {
        $user = new User;
        $user->email=$input['email'];
        $user->password=Hash::make($input['password']);
        $user->save();

        return Redirect::route('user.login');
    }

    return Redirect::route('user.signup')
      ->withInput()
      ->withErrors($validation);

	}

  public function getLogout()
  {
    Auth::logout();
    return Redirect::route('home');
  }

}
