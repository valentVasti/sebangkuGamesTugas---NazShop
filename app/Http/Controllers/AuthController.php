<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone_num' => 'required|unique:users'
        ];

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_num' => $request->phone_num,
        ];

        $message = [
            'name.required' => 'Fill this so we know how to call you!',
            'email.required' => 'Let our information come straight to you!',
            'password.required' => 'Secure your account with proper password!',
            'phone_num.required' => 'Please, tell us for further information!',
            '*.unique' => 'Your data inputed is already taken!'
        ];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // To repopulate the form fields with the old input
        }

        $hashed_password = bcrypt($data['password']);
        $type = $request->type;

        Users::create([
            'id_role' => $type,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $hashed_password,
            'phone_num' => $data['phone_num']
        ]);

        $status = 'Success';

        return redirect()->route('frontend.login', compact('status'));
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $message = [
            'email.required' => 'Fill this with your registered email account!',
            'password.required' => `We need to make sure it's you!`,
        ];

        $validator = Validator::make($data, $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_login = Users::where('email', $data['email'])->first();

        if($user_login == null){
            return redirect()->back()->withInput()->withErrors(['credential_error' => 'It seems your email is not registered or you are not input the right password']);
        }

        if($user_login->id_role == '1'){
            return redirect()->back()->withInput()->withErrors(['credential_error' => 'It seems your email is not registered or you are not input the right password']);
        }

        if(Hash::check($data['password'], $user_login->password)){
            session([
                'user_data' => [
                    'id' => $user_login->id,
                    'id_role' => $user_login->id_role,
                    'name' => $user_login->name,
                    'email' => $user_login->email,
                    'phone_num' => $user_login->phone_num,
                    'approve_status' => $user_login->approve_status,
                ],
                'status_login' => 'User Login'
            ]);

            $user_login->update([
                'active_status' => true
            ]);

            return redirect()->intended('/');
        }

        // if (Auth::attempt($data)) {
        //     return redirect()->intended('/');
        // }

        return redirect()->back()->withInput()->withErrors(['credential_error' => 'It seems your email is not registered or you are not input the right password']);
    }

    public function logout()
    {
        $user_login = Users::find(session('user_data')['id']);

        session()->forget(['user_data', 'status_login']);

        $user_login->update([
            'active_status' => false
        ]);

        // Redirect to a specific route or URL after logout
        return redirect()->route('frontend.home');
    }
}
