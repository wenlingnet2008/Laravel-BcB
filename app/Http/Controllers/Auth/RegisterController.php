<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function register(MemberRequest $request)
    {

        $member = new Member();
        $member->email = $request->input('email');
        $member->password = $request->input('password');
        $member->regip = $request->getClientIp();
        $member->saveMember();

        event(new Registered($member));
        $this->guard()->login($member);

        return $this->registered($request, $member)
            ?: redirect($this->redirectPath());

    }

}
