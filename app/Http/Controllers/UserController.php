<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','confirmed', 'min:6']
        ],
        [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email must be valid',
            'password.required'=>'Password is required',
            'password.confirmed'=>'Passwords must match',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/admin/posts')->with('message', 'User created and logged in');
    }


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logout');
    }


    public function login(){
        return view('users.login');
    }


    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ],
        [
            'email.required'=>'Email is required',
            'email.email'=>'Email must be valid',
            'password.required'=>'Password is required',
        ]);

        if(auth()->attempt($formFields)){
            return redirect('/admin/posts')->with('message', 'You are now logged in');
        }

        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.',
        ])->onlyInput('email');
        
    }



}
