<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    function index() {
        
        $users = User::with('role')->get();
        $roles['roles'] = Role::pluck('role', 'id');
        $data = $roles;

        return view('admin.user.index', $data, compact('users'));
    }

    function edit($id) {

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    function update(Request $request) {
        
        $user = User::find($request->user_id);

        $user->update([            
            'role_id' => $request->role_id
        ]);

        // Store a message
        session()->flash('msg','User has been updated');

        return redirect('/admin/users');
    } 
}
