<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Yajra\Datatables\Datatables;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function makeUsersTable(){
		$users = Self::all();

		return Datatables::of($users)
			->addColumn('actions', function ($user) {
				$table_buttons_html = '<div class="col-sm-10"><div class="col-sm-1"><a class="btn btn-primary btn-sm pull-right" href="/dashboard/users/edit/' . $user->id . '" class="btn btn-primary">Edit</a></div>';
				$table_buttons_html .= '<div class="col-sm-1"><a class="btn btn-danger btn-sm" href="/dashboard/users/destroy/' . $user->id . '">Delete</a></div></div>';

				return $table_buttons_html;
			})->make(true);
	}
}
