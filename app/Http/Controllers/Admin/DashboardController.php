<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaraMall\Admin\Sysinfo\Facades\Sysinfo;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index(){
        return view('admin.index');
    }

    public function password(){
        return view('admin.password');
    }

    public function changePassword(Request $request){

        $this->validate($request, ['password' => 'required|confirmed|min:6', 'oldpassword'=>'required']);
        $user = \request()->user();
        if(Hash::check($request->input('oldpassword'), $user->password)){
            $user->password = Hash::make($request->input('password'));
            $user->setRememberToken(Str::random(60));
            $user->save();
        }else{
            return view('layouts.admin.error_notice')->withErrors(['oldpassword'=>'原有密码错误']);
        }

        return view('layouts.admin.error_notice')->with(['status' => '修改成功']);

    }

    public function main(Request $request){
        $user = $request->user();
        $data['user'] = $user;


        $data['sysinfo'] = [
            'server' => Sysinfo::server(),
            'memory' => Sysinfo::memory(),
            'laraver' => Sysinfo::laraver(),
            'timezone' => Sysinfo::timezone(),
            'upload_max_filesize' => Sysinfo::upload_max_filesize(),
            'mysql' => Sysinfo::mysql(),
            'php'   => Sysinfo::php(),
            'ip'    => Sysinfo::ip(),
            'webserver' => Sysinfo::webserver(),

        ];

        return view('admin.dashboard', $data);
    }
}
