<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];

        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        $message = [
            'name.required' => 'Username must be filled!',
            'password.required' => 'Password must be filled!',
        ];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Users::where('name', $data['name'])->first();

        if ($user != null) {
            if ($user->id_role != '1') {
                return redirect()->back()
                    ->withErrors([
                        'not_admin' => 'You are not an admin!'
                    ])
                    ->withInput();
            }
        } else {
            return redirect()->back()
                ->withErrors([
                    'credentials_error' => 'Username or password false!'
                ])
                ->withInput();
        }


        if (Auth::attempt($data)) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()
                ->withErrors([
                    'credentials_error' => 'Username or password false!'
                ])
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        // Redirect to a specific route or URL after logout
        return redirect()->route('backend.login');
    }
}
