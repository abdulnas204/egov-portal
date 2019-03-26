<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$seo_title = __('titles.dashboard');
        return view('government.dashboard', compact('seo_title'));
    }
}
