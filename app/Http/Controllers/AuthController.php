<?php

namespace App\Http\Controllers;

use App\Requests\AuthenticateRequest;
use App\Requests\TwoFactorRequest;
use App\Models\Citizen;

use Illuminate\Http\Request;
use Auth;
use Hash;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Client
 */
class AuthController extends Controller
{

    protected $redirectPath = '/';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        $seo_title = __('titles.citizen.login');
        return view('auth.login', compact('seo_title'));
    }

    /**
     * @param AuthenticateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(AuthenticateRequest $request)
    {
        $twoFactor = app('pragmarx.google2fa');

        $credentials = [
            'identifier' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (auth('citizen')->attempt($credentials, $request->has('remember_me'))) {
            $user = auth('citizen')->user();
            if (false === $user->active) {
                auth('citizen')->logout();

                return back()->exceptInput('password')->withErrors([trans('validation.account.inactive')]);
            }

            if ($user->auth_token === '') {
                session()->put('user_id', $user->id);

                auth('citizen')->logout();

                return redirect()->route('activate_2fa');
            }

            if(null === $request->input('auth_token') || !$twoFactor->verifyKey($user->auth_token, $request->input('auth_token'), 8)) {
                auth('citizen')->logout();

                return back()->withErrors([trans('validation.account.invalid')])->exceptInput('password');
            }

            return redirect()->route('dashboard');
        }

        return back()->exceptInput('password')->withErrors([trans('validation.account.invalid')]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth('citizen')->logout();

        return redirect()->route('login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activate2fa()
    {
        $user = Citizen::find(session('user_id'));

        if ($user->auth_token) {
            return redirect()->route('login')->withMessage(trans('validation.2fa.already_set'));
        }

        $twoFactor = app('pragmarx.google2fa');

        $secretKey = $user->auth_token;
        if ($secretKey === '') {
            $secretKey = $twoFactor->generateSecretKey(16);
        }

        $qrImage = $twoFactor->getQrCodeInline(
            str_replace("_", " ", config('app.name')),
            $user->identifier . "(" . $user->first_name . " " . $user->last_name . ")",
            $secretKey
        );

        $seo_title = __('titles.citizen.2fa');

        return view('auth.2fa', compact('user', 'secretKey', 'qrImage', 'seo_title'));
    }

    public function postActivate2fa(TwoFactorRequest $request)
    {
        $user = Citizen::find(session('user_id'));
        $user->update(['auth_token' => $request->input('auth_token')]);

        $twoFactor = app('pragmarx.google2fa');
        if ($twoFactor->verifyKey($user->auth_token, $request->input('token'), 3)) {
            auth('citizen')->loginUsingId($user->id);
            session()->forget('user_id');

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['validation.2fa.invalid']);
    }

}
