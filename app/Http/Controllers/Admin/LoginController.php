<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        if(Auth::check()){
            return redirect()->route('admin.dash.index');
        }else{
            return redirect()->guest(route('admin.login.show'));
        }
    }

    public function show()
    {
        $data['title'] = '后台登录 - '.config('site.name');
        return view('admin.login', $data);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'is_admin' => 1,
            ],
            $request->filled('remember')
        )) {
            return redirect()->intended(route('admin.dash.index'));
        }

        return redirect()->route('admin.login.show')->withErrors([
            'email' => '账号或者密码错误',
        ]);


    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login.show');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }


}
