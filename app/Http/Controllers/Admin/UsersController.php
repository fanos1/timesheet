<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    
    public function index() {
    	$users = User::all();
    	return view('backend.users.index', compact('users'));
    }


    public function edit($id) {

    	$user = User::whereId($id)->firstOrFail();
		$roles = Role::all();

		// the name of the user's  role's [name] of the users
		$selectedRoles = $user->roles()->pluck('name')->toArray();

		return	view('backend.users.edit',	compact('user',	'roles', 'selectedRoles'));
    }


    public function update($id, UserEditFormRequest $request) {

    	$user = User::whereId($id)->firstOrFail();
		$user->name	= $request->get('name');
		$user->email =	$request->get('email');
		$password = $request->get('password');

		// if user also wants to change password, handle it. otherwise nothing
		if($password !=	"")	{
			$user->password	= Hash::make($password);
		}
		$user->save();
		
		// syncRoles() :: is a laravel-permission method that we can use to automatically SYNC (attach and detach) multipel rols
		// This method will retrieve the $role array name="role[]", which contains role's IDs, and attach the appropriate roles to the user.
		// if there is no role, it will detach the role from the user.
		$user->syncRoles($request->get('role'));

		return	redirect(action('Admin\UsersController@edit', $user->id))->with('status',	'The user has been updated!');

    }


}