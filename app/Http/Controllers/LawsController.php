<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\LogRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class LawsController extends Controller
{
    public function index()
    {
    	$seo_title 	= __('titles.government.law.index');
    	$laws 	= Law::all();
        return view('law.index', compact('seo_title', 'laws'));
    }

    public function show($id)
    {
    	$law = Law::find($id);
    	$seo_title 	= __('titles.government.law.show', ['name' => $law->name]);
        return view('law.show', compact('seo_title', 'law'));
    }

    public function pdf($id)
    {
        $law = Law::find($id);
        $pdf = PDF::loadView('pdf.law', ['law' => $law]);
        return $pdf->stream(Str::slug($law->name, '-').'.pdf');
    }
}
