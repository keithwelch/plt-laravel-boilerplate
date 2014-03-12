<?php

class AdminUsersController extends \BaseController {

    /**
     * User Repository
     *
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->where('id', '<>', Auth::user()->id)->get();
        return View::make('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $user = new User;
            $user->email=$input['email'];
            $user->password=Hash::make($input['password']);
            $user->is_active = isset($input['is_active']) ? true : false;
            $user->is_admin=isset($input['is_admin']) ? true : false;
            $user->save();

            return Redirect::route('admin.users.index');
        }

        return Redirect::route('admin.users.create')
            ->withInput()
            ->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return View::make('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('admin.users.index');
        }

        return View::make('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), array('_method'));
        // Not using User::$rules here because of unique:users,email,USER_ID
        $rules = array(
          'email'=>'required|email|unique:users,email,'.$id,
          'password'=>'required|min:6|confirmed',
        );
        if (empty($input['password'])) {
          unset($input['password']);
          unset($rules['password']);
        }
        $validation = Validator::make($input, $rules);

        if ($validation->passes())
        {
            $user = $this->user->find($id);
            if (!empty($input['password'])) Hash::make($input['password']);
            $user->email = $input['email'];
            if (!empty($input['password'])) $user->password = Hash::make($input['password']);
            $user->is_active = isset($input['is_active']) ? true : false;
            $user->is_admin=isset($input['is_admin']) ? true : false;
            $user->save();
            return Redirect::route('admin.users.index');
        }

        return Redirect::route('admin.users.edit', $id)
            ->withInput()
            ->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return Redirect::route('admin.users.index');
    }

}
