<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Login\RememberMeExpiration;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    use RememberMeExpiration;

    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)):
            return redirect()->to('login')
            ->withSuccess("Credentials do not match!");
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;
        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if(Auth::check() && Auth::user()->role == 'admin'){
            return redirect()->route('dashboard.index');
        }elseif(Auth::check() && Auth::user()->role == 'superadmin'){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->route('user.dashboard.index');
        }
    }
}