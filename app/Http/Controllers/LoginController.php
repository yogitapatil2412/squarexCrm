<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;


class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function registration()
    {
        $roles = Role::where('id', '!=' , 1)->orderBy('id','asc')->get();
        return view('auth.registration', compact('roles'));
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'full_name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6',
            'role'         =>   'required'
        ]);

        $data = $request->all();

        User::create([
            'full_name'  =>  $data['full_name'],
            'email' =>  $data['email'],
            'image' =>  'default.png',
            'password' => Hash::make($data['password']),
            'role' =>  $data['role']
        ]);
        
        // return redirect('login')->with('success', 'Registration Completed, now you can login');
        $notify[] = ['success', 'Registration Completed, now you can login.'];
        return redirect()->route('login')->withNotify($notify);
    }

    function validate_login(Request $request)
    {
        // $password = Hash::make($request['password']);
        // echo $password;die();
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
    // public function logout(Request $request)
    // {
    //     $this->guard('admin')->logout();
    //     $request->session()->invalidate();
    //     return $this->loggedOut($request) ?: redirect('login');
    // }
}
