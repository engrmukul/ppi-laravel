<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('frontend.register');
    }

    public function processRegister(Request $request)
    {
        // validation
        $this->validate($request, [
            'full_name'    => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|min:6|max:13|unique:users,phone_number',
            'password'     => 'required|min:6|confirmed',
        ]);

        $data = [
            'full_name'    => $request->input('full_name'),
            'email'        => strtolower($request->input('email')),
            'phone_number' => $request->input('phone_number'),
            'password'     => bcrypt($request->input('password')),
        ];

        try {
            User::create($data);
            $this->setSuccessMessage('User account created.');

            return redirect()->route('login');
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());

            return redirect()->back();
        }
    }

    public function showLoginForm()
    {
        return view('frontend.login');
    }

    public function processLogin(Request $request)
    {
        // validation
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }

        $this->setErrorMessage('Invalid credentials.');

        return redirect()->back();
    }

    public function showProfile()
    {
        $data['user'] = auth()->user();

        return view('backend.profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $user = optional(auth()->user());

        $this->validate($request, [
            'full_name'    => 'required',
            'email'        => 'required|email|unique:users,email,'.$user->id,
            'phone_number' => 'required|min:6|max:13|unique:users,phone_number, '.$user->id,
            'address'      => 'required',
        ]);

        $inputs = $request->except(['_token']);
        $user->update($inputs);
        $this->setSuccessMessage('Profile updated.');

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $user = optional(auth()->user());

        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required|min:6|confirmed',
        ]);

        $credentials = [
            'email'    => $user->email,
            'password' => $request->input('old_password'),
        ];

        if (auth()->attempt($credentials)) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);

            $this->setSuccessMessage('Password changed.');

            return redirect()->back();
        }

        $this->setErrorMessage('Old password is wrong.');

        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        $this->setSuccessMessage('User has been logged out.');

        return redirect()->route('login');
    }
}
