<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$seo_title = __('titles.dashboard');
        return view('dashboard', compact('seo_title'));
    }
}
