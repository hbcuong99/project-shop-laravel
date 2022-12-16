<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login', [
            'title' => 'Sign In'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request ,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->route('main');
        }

        Session::flash('error', 'Email or password is incorrect');

        return redirect()->back();
    }
}
