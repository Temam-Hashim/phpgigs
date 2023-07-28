<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //show register form

    public function register(){
        return view('auth.register');
    }

    // show login form
    public function loginPage(){
        return view('auth.login');
    }

    // authenicate user login
     public function loginUser(Request $request)
     {
         $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);

         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role=='admin') {
                return redirect('/admin')->with('message', 'Login successful!');
            }
             return redirect('/')->with('message', 'Login successful!');
         } else {
             // Authentication failed, redirect back to the login form with errors
             return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
         }
     }

    //  handle user registeration
    public function createUser(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'name'=>'required',
            'email'=>['required','email',Rule::unique('users','email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required_with:password', 'same:password'],

        ]);

         // Remove the 'password_confirmation' field from the $formFields array
         unset($formFields['password_confirmation']);

        // Hash the password
         $formFields['password'] = Hash::make($formFields['password']);
        // $formFields['password'] = bcrypt($formFields['password']);

        $user  = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message','Account created successfully');
    }

    public function logout(Request $request){
        // auth()->logout()
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','you have been logged out successfully');
    }
}