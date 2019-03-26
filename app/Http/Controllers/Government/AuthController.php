<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use App\Requests\AuthenticateRequest;
use App\Requests\TwoFactorRequest;
use App\Models\GovernmentAdmin;

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
        $seo_title = __('titles.government.login');
        return view('government.auth.login', compact('seo_title'));
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
            'name'      => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        if (auth('government')->attempt($credentials, $request->has('remember_me'))) {
            $user = auth('government')->user();
            if (false === $user->active) {
                auth('government')->logout();

                return back()->exceptInput('password')->withErrors([trans('validation.account.inactive')]);
            }

            if ($user->auth_token === '') {
                session()->put('government_user_id', $user->id);

                auth('government')->logout();

                return redirect()->route('government.activate_2fa');
            }

            if(null === $request->input('auth_token') || !$twoFactor->verifyKey($user->auth_token, $request->input('auth_token'), 8)) {
                auth('government')->logout();

                return back()->withErrors([trans('validation.account.invalid')])->exceptInput('password');
            }

            return redirect()->route('government.dashboard');
        }

        return back()->exceptInput('password')->withErrors([trans('validation.account.invalid')]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth('government')->logout();

        return redirect()->route('government.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activate2fa()
    {
        $user = GovernmentAdmin::find(session('government_user_id'));

        if ($user->auth_token) {
            return redirect()->route('government.login')->withMessage(trans('validation.2fa.already_set'));
        }

        $twoFactor = app('pragmarx.google2fa');

        $secretKey = $user->auth_token;
        if ($secretKey === '') {
            $secretKey = $twoFactor->generateSecretKey(16);
        }

        $qrImage = $twoFactor->getQrCodeInline(
            str_replace("_", " ", config('app.name')). " Government Admin",
            $user->id . "(" . $user->full_name . ")",
            $secretKey
        );

        $seo_title = __('titles.government.2fa');

        return view('government.auth.2fa', compact('user', 'secretKey', 'qrImage', 'seo_title'));
    }

    public function postActivate2fa(TwoFactorRequest $request)
    {
        $user = GovernmentAdmin::find(session('government_user_id'));
        $user->update(['auth_token' => $request->input('auth_token')]);

        $twoFactor = app('pragmarx.google2fa');
        if ($twoFactor->verifyKey($user->auth_token, $request->input('token'), 3)) {
            auth('government')->loginUsingId($user->id);
            session()->forget('government_user_id');

            return redirect()->route('government.dashboard');
        }

        return back()->withErrors(['validation.2fa.invalid']);
    }
}
