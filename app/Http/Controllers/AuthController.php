<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validate the registration inputs.
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|confirmed|min:6',
        ]);
    
        // Create the user with encrypted password.
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        // Optionally, use a "remember me" flag if you provide that input in the registration form.
        // For instance, you might add a checkbox named 'remember' in your registration HTML form.
        $remember = $request->has('remember');
    
        // Immediately log the user in. Passing the $remember flag will generate the remember token.
        Auth::login($user, $remember);
    
        // Regenerating the session for security.
        $request->session()->regenerate();
    
        // Redirect user after successful registration.
        return redirect()->intended('/dashboard');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data.
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        // Check if the remember me checkbox is selected.
        // This will be 'true' if the checkbox is checked, 'false' otherwise.
        $remember = $request->has('remember');
    
        // Attempt authentication using the credentials and remember flag.
        if (Auth::attempt($credentials, $remember)) {
            // Regenerate session to prevent fixation attacks.
            $request->session()->regenerate();

            // Redirect user to intended dashboard.
            return redirect()->intended('/dashboard');
        }
    
        // Return back with a generic error message on failure.
        return back()->withErrors(['email' => 'Invalid credentials']);
    }    

    public function logouut(){
        Auth::logout();
        return redirect('/');
    }
}
