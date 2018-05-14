<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaraMall\Admin\Sysinfo\Facades\Sysinfo;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index(Request $request){
        $user = $request->user();
        $data['user'] = $user;

        $data['title'] = '控制台首页';

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
