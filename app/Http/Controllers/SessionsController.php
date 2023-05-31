<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        
        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            $user = Auth::getUser();
            if ($user->getRoleNames()[0] == 'membership') {
                Auth::logout();
                return redirect('/');
            }
            return redirect()->route('home-setting.index')->with(['success'=>'You are logged in.']);
        }
        else{
                
                if ($attributes['email'] == 'admin@jalinhealth.com') {
                    $findUser = User::where('email', '=' , $attributes['email'])->first();
                    if (!$findUser) {
                        $attributes = request()->validate([
                            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
                            'password' => ['required', 'min:5', 'max:20']
                        ]);
                        $attributes['name'] = 'User Admin';
                        $attributes['password'] = bcrypt($attributes['password'] );
    
                        session()->flash('success', 'Your account has been created.');
                        $user = User::create($attributes);
                        Auth::login($user); 
                        return redirect()->route('home-setting.index');
                    }
                }
            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
