<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function index() {        
        return view('frontend.login.index');
    }

    public function storeLogin(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = [
            'email' => $request->email, 
            'password' => $request->password
        ];

        if(Auth::attempt($userData)){
            $auth = Auth::user()->role_id;
            if ($auth  == 1 || $auth  == 3 || $auth  == 4) {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
        } else {
            session()->flash('msg','Username atau password salah');

            return redirect()->back();
        }
    }

    public function register() {
        return view('frontend.register.index');
    }

    function store(Request $request) {
        
        // Validate data from user
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'no_telp' => 'required|min:11|max:13',
            'alamat' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        
        // Save data to user table
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password)
        ]);

        // Sign the user in
        auth()->login($user);

        return redirect ('/');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}