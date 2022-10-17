<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');   
    }

    public function showLoginForm()
    {
        $previousUrl = url()->previous();
        $baseUrl     = url()->to('/');

        if( $previousUrl != $baseUrl.'/login' ){
            session()->put('url.intended', $previousUrl);
        }

        return view('auth.login');
    }

    protected function authenticated()
    {   
        if( auth()->user()->role == 'admin' ){
            $this->redirectTo = route('admin.dashboard');
        }else{
            $this->redirectTo = route('author.dashboard');
        }
    }
}
