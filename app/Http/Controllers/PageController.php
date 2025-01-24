<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PageController extends Controller
{
    public function index_page()
    {
        return view('index');
    }


    public function login_page()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return 'there was error';
        } else {
            // return 'there was no error';

            $request->validate([
                'email' => 'required|email',
            ]);
            
            // Attempt to find the user by email
            $user = User::where('email', $request->email)->first();
            
            // Check if user exists
            if ($user) {
                return redirect()->route('home'); // Redirect to home if user is found
            } else {
                // Redirect back with an error message if user is not found
                return redirect()->back()->withErrors([
                    'email' => 'No user found with this email address.'
                ]);
            }

            /* $result = User::create([
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($request) {
                return redirect()->route('home');
            } else {
                return 'error while creating user' . $result;
            } */
        }

        // dd($validator);
    }


    public function register_page()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return 'there was error';
        } else {
            // return 'there was no error';

            $result = User::create([
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($request) {
                return redirect()->route('home');
                // return 'sucess'.$result;
            } else {
                return 'error while creating user' . $result;
            }
        }
    }
}
