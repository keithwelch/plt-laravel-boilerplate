<?php

class UsersController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create')->withPagetitle('Sign up');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    if (Auth::check()) return Redirect::to('/');
    $input = Input::all();
    $validation = Validator::make($input, User::$rules);

    if ($validation->passes())
    {
        $user = new User;
        $user->email=$input['email'];
        $user->password=Hash::make($input['password']);
        $user->save();

        return Redirect::to('/login');
    }

    return Redirect::to('/signup')
      ->withInput()
      ->withErrors($validation);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
    if (!Auth::check()) return Redirect::to('login');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
    if (!Auth::check()) return Redirect::to('login');
	}

}
