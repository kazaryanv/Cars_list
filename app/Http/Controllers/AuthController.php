<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\CarList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view("Auth.login");
    }

    public function login(LoginRequest $request) {
        $user_data = $request->only(['email', 'password']);
        if(Auth::attempt($user_data)) {
            if ($this->middleware('admin')->only('role' == 1)){
                return redirect()->route('carList.index');
            }else if ($this->middleware('admin')->only('role' == NULL)){
                return redirect()->route('posts.index');
            }
        } else {
            return redirect()->back()->withErrors(['validation' => 'We need to know your email address and password!']);
        }
    }

    public function register_view() {
        return view("Auth.register");

    }

    public function register(AuthRequest $request) {
        $data = $request->all();
        $check = $this->create_user($data);

        return redirect()
            ->route('login-view')
            ->with("success", "User successfully created!");



    }

    public function create_user(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])


        ]);
    }


    public function  logout() {
        Auth::logout();
        return redirect()->route('login-view');
    }
}
