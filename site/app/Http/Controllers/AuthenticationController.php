<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthenticationService;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    public function __construct(
        private AuthenticationService $authenticationService
    )
    {
        
    }

    public function showForm()
    {
        return view('login.form');
    }

    public function login(Request $request)
    {
        /*$request->validate([
            'email' => 'email'
        ]);*/

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $user->sendAuthenticationMail("/home");

            return view('login.form', [
                 'TestConnection' => true
             ]);
        }
    }
    public function callback(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'redirect_to' => 'required|string'
        ]);

        /*$email = $request->query('email');
        $token = $request->query('token');
        $redirectTo = $request->query('redirect_to');*/

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return Redirect::route('login')->withErrors(['email' => 'bad user']);
        }

        $service = new AuthenticationService($user);

        //if (!$this->authenticationService->checkToken($token)) {
        if (!$service->checkToken($request->token)) {
            return Redirect::route('login')->withErrors(['email' => $request->token ]);
        }

        Auth::login($user);
        return redirect($request->redirectTo);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}