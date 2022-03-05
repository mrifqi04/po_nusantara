<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    public function index() {        
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    function store(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $userData = [
            'email' => $request->email, 
            'password' => $request->password
        ];
        // dd(Auth::attempt($userData), $request);
        if(Auth::attempt($userData)){
            $auth = Auth::user()->role_id;
            if ($auth  == 1 || $auth  == 3 || $auth  == 4) {
                return redirect('admin');
            } else {
                return redirect('/');
            }
        } else {
            session()->flash('msg','Username atau password salah');

            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
