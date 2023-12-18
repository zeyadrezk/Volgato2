<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 1) {
                $token = $user->createToken('user')->plainTextToken;

                return redirect()->route('dashboard.products.index')->with('success', 'Login Success');
            }elseif ($user->role ==0) {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors( 'you arent verified to login');

            }
        }

        return redirect()->back()->withErrors( 'Invalid login credentials');
    }

    public function signIn(){
        return view('dashboard.admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.signIn');
    }







}
