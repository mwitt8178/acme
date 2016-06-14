<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    public function __construct(){}

    /**
     * @return users.blade.php
     */
    public function index(){
        return view('dashboard.users');
    }

    /**
     * @return users datatable
     */
    public function fetchUsersTable(){
        return User::makeUsersTable();
    }

    public function create(){
        return view('users.add');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users|max:50',
            'name' => 'required|max:50',
            'department' => 'required|max:50',
            'supervisor' => 'required|max:50',
            'position' => 'required|max:50',
            'birthday' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/users/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->department = $request->department;
        $user->supervisor = $request->supervisor;
        $user->position = $request->position;
        $user->birthday = $request->birthday;

        $user->save();

        return redirect('/dashboard/users');
    }

    public function edit($user_id){
        $user = User::find($user_id);

        if($user)
            return view('users.edit', $user);

        return redirect('/dashboard/users')->withErrors('User Not Found');
    }

    public function update($user_id, Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'department' => 'required|max:50',
            'supervisor' => 'required|max:50',
            'position' => 'required|max:50',
            'birthday' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/users/edit/'.$user_id)
                ->withErrors($validator)
                ->withInput();
        }

        $form_data['name'] = $request->name;
        $form_data['department'] = $request->department;
        $form_data['supervisor'] = $request->supervisor;
        $form_data['position'] = $request->position;
        $form_data['birthday'] = $request->birthday;

        if(User::where('id', $user_id)->update($form_data))
            return redirect()->back()->withSuccess('User Successfully Updated');

        return redirect()->back()->withErrors('Failed Update User!');
    }

    public function destroy($user_id){
        $user = Auth::user();

        if($user->id == (int)$user_id)
            return redirect('/dashboard/users')->withErrors('Cannot Delete Your User Profile!');

        User::destroy($user_id);
        return redirect('/dashboard/users');
    }
}
