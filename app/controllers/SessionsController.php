<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create')->withPagetitle('Login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $input = Input::all();

    $attempt = Auth::attempt(
      array(
        'email' => $input['email'],
        'password' => $input['password'],
      )
    );

    if ($attempt) return Redirect::intended('/dashboard');

    Session::flash('loginError', 'Invalid username or password.');

    return Redirect::to('/login');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
    Auth::logout();
    return Redirect::to('/');
	}

}
