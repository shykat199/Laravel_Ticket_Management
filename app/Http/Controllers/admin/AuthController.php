<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use function MongoDB\BSON\toRelaxedExtendedJSON;

class AuthController extends Controller
{
    public function loginPage()
    {

        if (Auth::user() && Auth::check()) {
            if (Auth::user()->user_role === 'admin') {
                return redirect()->route('admin.category.index');
            }
        }

        return view('admin.auth.login');
    }

    public function registerPage()
    {
        if (Auth::check()) {
            return redirect()->route('admin.category.index');
        }
        return view('admin.auth.register');
    }

    public function register(UserRegisterRequest $request): ?\Illuminate\Http\RedirectResponse
    {

        $createUser = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),

        ]);
        if ($createUser) {
            return to_route('admin.login_page')->with('success', 'User Created Successfully.');
        } else {
            return Redirect::back()->with('error', 'Some Thing Wrong.');
        }

    }

    public function login(UserLoginRequest $request)
    {
        $check = $request->all();
        // dd($check);
        if (Auth::attempt([
            'email' => $check['email'],
            'password' => $check['password'],
        ])) {
            if (Auth::user()->user_role === 'admin') {
                return to_route('admin.category.index')->with('success', 'Successfully Login');
            } else {
                return "Normal User";
            }
        } else {
            return Redirect::back()->with('error', 'Wrong Credential, Try Again...');
        }
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return to_route('admin.login_page')->with('success', 'Logout Successfully...');
    }
}
