<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

  protected $guarded = array('id', 'created_at', 'updated_at');

  public static $rules = array(
    'email'=>'required|email|unique:users,email',
    'password'=>'required|min:6|confirmed',
  );

  public static $messages = array(
    'email.required'=>'Please fill out the email address.',
    'email.email'=>'A valid email address is required.',
    'email.unique'=>'That email address is already registered.',
    'password.required'=>'A password is required',
    'password.min'=>'Your password must be at least 6 characters.',
    'password.confirmed'=>'The passwords did not match.',
  );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

  public function getRememberToken()
  {
      return $this->remember_token;
  }

  public function setRememberToken($value)
  {
      $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
      return 'remember_token';
  }

  public function setEmailAttribute($value)
  {
    $this->attributes['email'] = strtolower($value);
  }

}
