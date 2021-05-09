<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('login');
    }

    public function postlogin(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            $request->session()->flash('error', 'User is Not Match');
            return view('login');
        } else {
            $request->session()->put('user', $user);
            return redirect('/');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function postUser(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password1 = $request->password1;

        if ($password == $password1) {
            $user = User::where(['email' => $email])->first();
            if (!$user) {
                $newUser = new User;
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->password = Hash::make($password);

                if ($newUser->save()) {
                    $request->session()->flash('success', 'You have Registered Successfully.');
                    return view('login');
                } else {
                    $request->session()->flash('error', 'Some thing is wrong please try again.');
                    return view('register');
                }
            } else {
                $request->session()->flash('error', 'Email is allready exists.');
                return view('register');
            }
        } else {
            $request->session()->flash('error', 'Password is not match.');
            return view('register');
        }
    }
}
